<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Concrete;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\UseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Normalizers\StringValueNormalizer;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Pipes\SetAttributeValuePipe;
use Architecture\XmlSchemator\Enums\Xml\Contracts\ElementAttributesEnum;
use Architecture\XmlSchemator\Parents\Values\Data;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Support\Validation\ValidationContext;

/**
 * An AttributeValue validates the value that is assigned to it
 * by running a series of rule validations given
 * by the set of restrictions provided by the traits (which extends the AttributeRule)
 * that this AttributeValue uses.
 * If the type property is specified, it will also validate that
 * the passed value is consistent with it, from the "Type" definition's restritions
 *
 * A child class of this AttributeValue will be provided with some of these parameters:
 *     - Name (string, Required)
 *     - Use ("required"|"optional")
 *     - Fixed (a certain value)
 *     - Type ("catCFDI:c_..."|"tdCFDI:t_...") from the catalogs or types
 *
 */
abstract class AttributeData extends Data
{
    const FIXED = null;

    const TYPE = null;

    public function __construct(
        public string|array $value
    )
    {}

    public static function rules(ValidationContext $context) {
        return [
            'value' => Static::TYPE->restrictionRules(),
        ];
    }

    public static function prepareForPipeline(array $properties) : array
    {
        Arr::set($properties, 'value', Static::FIXED ?? Arr::get($properties, 'value'));
        // $properties['value'] = Static::FIXED ?? $properties->get('value');
        // $properties->put('value', Static::FIXED ?? $properties->get('value'));

        return $properties;
    }

    // public static function prepareForPipeline(Collection $properties) : Collection
    // {
    //     $properties->put('value', Static::FIXED ?? $properties->get('value'));

    //     return $properties;
    // }

    // public static function normalizers(): array
    // {
    //     return [
    //         ArrayNormalizer::class,
    //         // StringValueNormalizer::class,
    //     ];
    // }

    public function __toString()
    {
        // dump($this->toArray());
        return json_encode($this->toArray());
    }
}
