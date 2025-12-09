<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Serializers\Traits;

use App\Containers\SatCfdi\CfdiV33\Models\Comprobante\Conceptos\Concepto;
use App\Containers\SatCfdi\CfdiV33\Models\Comprobante\Conceptos\Concepto\Parte;
use Architecture\XmlSchemator\Analyzers\Xml\Deserializers\Attributes\IsRelationshipMethod;
use Architecture\XmlSchemator\Parents\Models\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Sabre\Xml\Writer;

trait ModelSerializerTrait
{
    public static function xmlSerializer(Writer $writer) {
        $attributesData = collect($reader->parseAttributes())
            ->map(fn ($property) => ['value' => $property])
            ->toArray();

        $elementData = (Self::$elementData)::validateAndCreate($attributesData);

        $entityNode = Self::make($elementData->all());
        // dump([Self::class => Self::$deserializers]);
        $children = collect($reader->parseInnerTree(Self::$deserializers));

        $reflector = new \ReflectionClass(Self::class);

        $relationshipMethodAttributes = collect($reflector->getMethods(\ReflectionMethod::IS_FINAL))
            ->mapWithKeys(fn ($method) => [$method->getName() => $method->getAttributes(IsRelationshipMethod::class)])
            ->filter()
            ->map(fn ($attributes) => Arr::get($attributes, 0)->getArguments());

        $children
            ->filter(fn ($childElement) => Arr::get($childElement, 'value') instanceof Model)
            ->each(function ($childElement) use ($entityNode, $relationshipMethodAttributes) {
                $childModel = Arr::get($childElement, 'value');
                $relationshipMethodName = Str::of(Arr::get($childElement, 'name'))->afterLast('}')->camel()->toString();
                $classAttribute = $relationshipMethodAttributes->get($relationshipMethodName);
                $relationshipType = Arr::get($classAttribute, 'relationshipType');
                // if(is_a($entityNode, \App\Containers\Sat\CfdiV40\Models\Comprobante\Complemento::class) || is_a($childModel, \App\Containers\Sat\CfdiV40\Models\Comprobante\Complemento::class)){
                //     dump(Self::class, get_class($childModel), $relationshipType);
                // }
                match ($relationshipType) {
                    'embedsOne', 'embedsMany' => $entityNode->$relationshipMethodName()->associate($childModel)/* && $entityNode->save()*/,
                    default => ($entityNode->exists ?: $entityNode->save()) && $entityNode->$relationshipMethodName()->save($childModel),
                };
            });


        return $entityNode;
    }
}
