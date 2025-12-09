<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the lower bounds for numeric values (the value must be greater than or equal to this value)
 */
class MinInclusiveAttributeRule extends AttributeRule
{
    private float $minInclusiveValue;

    public function __construct(float $minInclusiveValue)
    {
        $this->minInclusiveValue = $minInclusiveValue;
    }

    protected function validate(mixed $value): bool
    {
        return $value > $this->minInclusiveValue;
    }
}
