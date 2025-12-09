<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the upper bounds for numeric values (the value must be less than or equal to this value)
 */
class MaxInclusiveAttributeRule extends AttributeRule
{
    private float $maxInclusiveValue;

    public function __construct(float $maxInclusiveValue)
    {
        $this->maxInclusiveValue = $maxInclusiveValue;
    }

    protected function validate(mixed $value): bool
    {
        return $value <= $this->maxInclusiveValue;
    }
}
