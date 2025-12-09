<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Transformers\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Transformers\Attributes\IsRelationshipMethod;
use Architecture\XmlSchemator\Models\Contracts;
// use Architecture\XmlSchemator\Models\Contracts\ComplementoInterface;
use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Complemento;
use App\Containers\Sat\Cfdi\Values\Elements\NamespacesElement;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Tfd\Models\V11 as TimbreFiscalDigitalV11Models;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Sabre\Xml\Reader;
use Sabre\Xml\Writer;

trait XmlTransformerTrait
{
    use ArrayTransformerTrait;

    public function xmlSerialize(Writer $writer): void
    {
        $serialized = $this->arraySerializer();

        $writer->writeAttributes(Arr::get($serialized, 'attributes'));

        $writer->write(Arr::get($serialized, 'value'));
    }

    /**
     * When a model implements this trait's method. it allows it to deserialize an XML node into this model recursively
     * @param  Reader     $reader      The XML reader instance for the respective node currently beign parsed
     * @param  Model|null $parentModel The already saved (with in the previous recursive call) parent model, according to the XML definition
     * @return Self                  The Build model from the XML reader attributes values
     */
    public static function xmlDeserialize(
        Reader $reader,
        Model $parentModel = null
    ): static
    {
        $attributesData = static::getXmlAttributesDataFromReaderElement($reader);

        $entityModel = static::makeEntity($reader, $attributesData, $parentModel);

        static::attachCurrentEntityToParent($entityModel, $parentModel);

        $children = collect($reader->parseInnerTree(static::$xmlDeserializers, $entityModel));

        return $entityModel;
    }

    protected static function getXmlAttributesDataFromReaderElement(Reader $reader): Collection
    {
        $elementAttributes = $reader->parseAttributes();

        return collect($elementAttributes)
            ->mapToGroups(function ($attributeValue, $attributeName) {
                preg_match('/^(?<element>(?<clark>\{(?<uri>.*)\})*(?<name>.+))$/', $attributeName, $matches);

                $groupKey = match (Arr::get($matches, 'uri')) {
                    'http://www.w3.org/2000/xmlns/'             => 'namespaces',
                    'http://www.w3.org/2001/XMLSchema-instance' => 'schemaLocations',
                    default                                     => 'attributes',
                };

                $attribute = Arr::has($matches, 'uri')
                    ? Arr::only($matches, ['uri', 'name'])
                    : Arr::only($matches, ['name']);

                Arr::set($attribute, 'value', $attributeValue);

                return [$groupKey => $attribute];
            });
    }

    protected static function makeEntity(
        Reader $reader,
        Collection $attributesData,
        Model $parentModel = null
    ): static
    {
        $entityData = static::getEntityDataFromAttributesData($reader, $attributesData, $parentModel);

        $entityModel = self::make($entityData);

        $attributesData->has('namespaces') && $attributesData->get('namespaces')
            ->whenNotEmpty(fn ($namespaces) => $entityModel->Namespaces = $namespaces);

        return $entityModel;
    }

    protected static function getEntityDataFromAttributesData(
        Reader $reader,
        Collection $attributesData,
        Model $parentModel = null
    ): array
    {
        // dump($attributesData, self::class, static::class);
        $entityData = $attributesData->get('attributes')
            ?->mapWithKeys(fn ($attribute) => [
                Arr::get($attribute, 'name') => ['value' => Arr::get($attribute, 'value')]
            ])
            ?->pipe(function ($attributes) use ($reader, $attributesData, $parentModel) {
                // if (!is_null($parentModel)) {
                //     dd(get_class($parentModel), $parentModel?->comprobante);
                // }
                // dump(static::$elementData, $attributes);
                return (static::$elementData)::validateAndCreate($attributes)->all();
            });

        return $entityData ?? [];
    }

    protected static function attachCurrentEntityToParent(
        Model $entityModel,
        Model $parentModel = null
    )
    {
        // When Entity has no parent, save immediately
        if (is_null($parentModel)) {
            return $entityModel->save();
        }

        // dump(get_class($parentModel));
        // Otherwise, since we want to know through which relationship method we are saving the current model entity
        // we get parent relationship method corresponding to the entity model
        $reflectorMethod = static::getParentRelationshipMethodForEntity($entityModel, get_class($parentModel));

        $relationshipName = $reflectorMethod->getName();

        // dump($reflectorMethod, $relationshipName, $relatedModelClassName);
        switch ((string) $reflectorMethod->getReturnType()) {
            case 'MongoDB\Laravel\Relations\EmbedsOne':
                $parentModel->$relationshipName($entityModel)->save($entityModel);
            break;

            case 'MongoDB\Laravel\Relations\EmbedsMany':
                $parentModel->$relationshipName($entityModel)->associate($entityModel);
                $parentModel->save();
            break;

            case 'MongoDB\Laravel\Relations\HasOne':
            case 'MongoDB\Laravel\Relations\HasMany':
                // $relatedModelClassName = $reflectorMethod->getParameters()[0]->getType()->getName();

                $reflectionNamedType = $reflectorMethod->getParameters()[0]->getType();

                collect(match (get_class($reflectionNamedType)) {
                    \ReflectionNamedType::class => [$reflectionNamedType],
                    \ReflectionUnionType::class => $reflectionNamedType->getTypes(),
                    default                     => null,
                })
                    ->groupBy(fn (\ReflectionNamedType $reflectionNamedType)
                        => match ($reflectionNamedType->getName()) {
                            NominaV12Models\Nomina::class                           => Contracts\NominaInterface::class,
                            TimbreFiscalDigitalV11Models\TimbreFiscalDigital::class => Contracts\TimbreFiscalDigitalInterface::class,
                            default                                                 => null,
                        }
                    )
                    ->keys()
                    ->each(function ($typeNameInterface) use ($entityModel, $parentModel) {
                        switch ($typeNameInterface) {
                            case Contracts\NominaInterface::class:
                                $parentModel->NominaVersion = $entityModel->Version;
                                $entityModel->ComprobanteVersion = $parentModel->getParentRelation()->getModel()->Version;
                                $parentModel->save();
                            break;
                            case Contracts\TimbreFiscalDigitalInterface::class:
                                $parentModel->TimbreFiscalDigitalVersion = $entityModel->Version;
                                $entityModel->ComprobanteVersion = $parentModel->getParentRelation()->getModel()->Version;
                                $parentModel->save();
                            break;
                        }
                    });

                $parentModel->$relationshipName($entityModel)->save($entityModel);
            break;

            case 'MongoDB\Laravel\Relations\BelongsTo':
                dd(get_class($parentModel), get_class($entityModel));
                // TODO: To throw an exception that describes that the parsing of the xml is going upwards from the node
                $parentModel->$relationshipName($entityModel)->associate($entityModel);
                $parentModel->save();
            break;

            default:
                $parentModel->$relationshipName($entityModel)->save($entityModel);

            break;
        }

        // match ($relationshipType) {
        //     'embedsOne'  => $parentModel->$relationshipName($entityModel)->save($entityModel),
        //     'embedsMany' => $parentModel->$relationshipName($entityModel)->associate($entityModel) && $parentModel->save(),
        //     default      => $parentModel->$relationshipName($entityModel)->save($entityModel)
        // };
    }

    protected static function getParentRelationshipMethodForEntity(
        Model $entityModel,
        string $parentClass = null
    ): \ReflectionMethod
    {
        // dump($parentClass ?? static::class);
        $reflectorClass = new \ReflectionClass($parentClass ?? static::class);

        return collect($reflectorClass->getMethods(\ReflectionMethod::IS_FINAL))
            // ->dd()
            ->filter(fn ($reflectorMethod)
                => in_array($reflectorMethod->getReturnType(), [
                    'MongoDB\Laravel\Relations\BelongsTo',
                    'MongoDB\Laravel\Relations\HasOne',
                    'MongoDB\Laravel\Relations\HasMany',
                    'MongoDB\Laravel\Relations\EmbedsOne',
                    'MongoDB\Laravel\Relations\EmbedsMany',
                ])
            )
            // ->dd()
            // ->first(fn ($reflectorMethod)
            //     => ($relatedModelClassName = $reflectorMethod->getParameters()[0]->getType()->getName())
            //         && (($entityModel instanceof $relatedModelClassName) || is_subclass_of($entityModel, $relatedModelClassName))
            // )
            ->first(function ($reflectorMethod) use ($entityModel) {
                $relatedModelClassName = $reflectorMethod->getParameters()[0]->getType();

                return $relatedModelClassName instanceof \ReflectionNamedType
                    ? ($relatedModelClassName = $relatedModelClassName->getName())
                    && (($entityModel instanceof $relatedModelClassName) || is_subclass_of($entityModel, $relatedModelClassName))
                    : false;
            });
    }
}
