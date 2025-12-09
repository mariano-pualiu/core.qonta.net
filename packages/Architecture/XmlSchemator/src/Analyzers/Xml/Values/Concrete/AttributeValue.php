<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Concrete;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\UseEnum;
use Architecture\XmlSchemator\Enums\Xml\Contracts\ElementAttributesEnum;
use Architecture\XmlSchemator\Parents\Values\Value;
use Illuminate\Pipeline\Pipeline;

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
abstract class AttributeValue extends Value
{
    const FIXED = null;

    const TYPE = null;

    /**
     * A resource key to be used in the serialized responses.
     */
    // protected static string $resourceKey = 'version_attribute';

    public $value;

    public function __construct($value)
    {
        $value = Self::FIXED ?? $value;

        $this->value = app(Pipeline::class)
            ->send($value)
            ->through(Self::TYPE->restrictionRules())
            ->thenReturn()
            ->get();
    }
}
