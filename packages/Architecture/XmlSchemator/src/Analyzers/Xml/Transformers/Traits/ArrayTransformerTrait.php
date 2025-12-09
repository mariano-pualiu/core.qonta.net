<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Transformers\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Models\Contracts\HasVersionedRelationships;
use Architecture\XmlSchemator\Parents\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Sabre\Xml\Reader;
use Sabre\Xml\Writer;

trait ArrayTransformerTrait
{
    public function arraySerializer()
    {
        $nestedRelationships = self::recursiveRelationships();
        dump($nestedRelationships);
        // dump($this->getAttributes());
        // dump($this->getRelations());
        $relationshipPaths = array_keys(Arr::dot($nestedRelationships));
        dump($relationshipPaths);
        \DB::enableQueryLog();
        $this->load($relationshipPaths);
        $nominaRelationshipPaths = array_keys(Arr::dot($nestedRelationships['complemento']['nomina']));
        dump($nominaRelationshipPaths, /*$this->complemento->getAttributes()*/);
        dump($this->complemento->nomina->load($nominaRelationshipPaths));
        $arrayForm = $this->transformIntoArray();
        dump(\DB::getQueryLog());
        dd($arrayForm);
        return $arrayForm;
    }

    public function transformIntoArray($parentClass = null)
    {
        $parentClass ??= static::class;
        dump($parentClass);

        $name = '{' . static::XML_NAMESPACE . '}' . Str::camel(static::XML_ELEMENT_NAME);

        $attributes = collect($this->only(array_keys($this->casts)))
                ->reject(fn ($attribute) => empty($attribute->value))
                ->map(fn ($attribute) => $attribute->value)
                ->toArray();

        // if (in_array(HasVersionedRelationships::class, class_implements($this))) {
        //     $nominaModelClass = self::resolveNominaVersionClass($this);
        //     dd($nominaModelClass);
        //     $nominaModelClass::recursiveRelationships(self::class);

        //     $timbreFiscalDigitalModelClass = self::getTimbreFiscalDigitalVersion($this);
        //     dump($timbreFiscalDigitalModelClass);
        //     $timbreFiscalDigitalModelClass::recursiveRelationships(self::class);
        // }

        $relationships = collect($this->getRelations());
        $relationships->keys()->dump();
        // $relationships->filter(function ($relationship, $relationshipName) use ($parentClass) {
        //     // dump([
        //     //     'relationshipName'                   => $relationshipName,
        //     //     '!empty($relationship)'              => !empty($relationship),
        //     //     'parentClass'                        => $parentClass,
        //     //     '!is_a($relationship, $parentClass)' => !is_a($relationship, $parentClass)
        //     // ]);
        //     return !empty($relationship) && !is_a($relationship, $parentClass);
        // });

        $value = $relationships
            ->filter(fn ($relationship) => !empty($relationship) && !is_a($relationship, $parentClass))
            // ->dd()
            ->map(function ($relationship, $relationshipName) {
                dump([$relationshipName => $relationship]);
                return match (true) {
                    is_a($relationship, Collection::class)
                        => $relationship->map(fn ($relatedModel) => $relatedModel->transformIntoArray(static::class)),
                    is_null($relationship) => null,
                    default => $relationship->transformIntoArray(static::class),
                };
            })
            ->toArray();


        $arrayExpression = [
            'name'       => $name,
            'attributes' => $attributes,
            'value'      => $value,
        ];

        return $arrayExpression;
    }

    protected static function recursiveRelationships($parentClass = null)
    {
        $reflectorClass = new \ReflectionClass(static::class);

        return collect($reflectorClass->getMethods(\ReflectionMethod::IS_FINAL))
            ->keyBy('name')
            ->filter(fn ($reflectorMethod) => in_array($reflectorMethod->getReturnType(), [
                'MongoDB\Laravel\Relations\BelongsTo',
                'MongoDB\Laravel\Relations\HasOne',
                'MongoDB\Laravel\Relations\HasMany',
                'MongoDB\Laravel\Relations\EmbedsOne',
                'MongoDB\Laravel\Relations\EmbedsMany',
            ]))
            ->reject(function ($reflectorMethod) use ($parentClass) {
                $reflectionNamedType = $reflectorMethod->getParameters()[0]->getType();

                $reflectionNamedTypeNames = collect(match (get_class($reflectionNamedType)) {
                    \ReflectionNamedType::class => [$reflectionNamedType],
                    \ReflectionUnionType::class => $reflectionNamedType->getTypes(),
                    default                     => null,
                });
                // dump([
                //     $reflectorMethod->getReturnType()->getName(),
                //     'MongoDB\Laravel\Relations\BelongsTo',
                //     $parentClass => $reflectorMethod->getReturnType()->getName() === 'MongoDB\Laravel\Relations\BelongsTo',
                //     $reflectionNamedTypeNames,
                //     $reflectionNamedTypeNames->contains(fn ($reflectionNamedType) => $reflectionNamedType->getName() === $parentClass)
                // ]);
                return $reflectorMethod->getReturnType()->getName() === 'MongoDB\Laravel\Relations\BelongsTo'
                    && $reflectionNamedTypeNames->contains(fn ($reflectionNamedType) => $reflectionNamedType->getName() === $parentClass);
            })
            ->map(function ($reflectorMethod) {
                $reflectionNamedType = $reflectorMethod->getParameters()[0]->getType();

                return array_merge_recursive(...collect(match (get_class($reflectionNamedType)) {
                    \ReflectionNamedType::class => [$reflectionNamedType],
                    \ReflectionUnionType::class => $reflectionNamedType->getTypes(),
                    default                     => null,
                })
                ->map(fn ($reflectionNamedType) => $reflectionNamedType->getName())
                ->map(fn ($reflectionNamedTypeName) => $reflectionNamedTypeName::recursiveRelationships(static::class))
                // ->mapWithKeys(fn ($reflectionNamedTypeName) => [$reflectionNamedTypeName => $reflectionNamedTypeName::recursiveRelationships(static::class)])
                ->all());
            })
            // ->dump()
            // ->map(function ($reflectorMethod) {
            //     $reflectionNamedType = $reflectorMethod->getParameters()[0]->getType();

            //     return collect(match (get_class($reflectionNamedType)) {
            //         \ReflectionNamedType::class => [$reflectionNamedType],
            //         \ReflectionUnionType::class => $reflectionNamedType->getTypes(),
            //         default                     => null,
            //     })
            //     // ->dump()
            //     ->map(fn ($reflectionNamedType) => dump(dump($reflectionNamedType->getName())::recursiveRelationships(static::class)))
            //     // ->dump()
            //     ->flatten()
            //     // ->dump()
            //     ->all();
            //     // ->map(function ($reflectionNamedType) {
            //     //     return $reflectionNamedType->getName()::recursiveRelationships(static::class);
            //     // });
            // })
            // ->map(function ($reflectorMethod) {
            //     $relatedModel = $reflectorMethod->getParameters()[0]->getType()->getName();
            //     interface_exists($relatedModel);
            //     return dump($relatedModel::recursiveRelationships(static::class));
            // })
            // ->dump()
            ->all();
    }
}
