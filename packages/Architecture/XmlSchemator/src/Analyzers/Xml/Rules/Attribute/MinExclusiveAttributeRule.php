<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the lower bounds for numeric values (the value must be greater than this value)
 */
class MinExclusiveAttributeRule extends AttributeRule
{
    private float $minExclusiveValue;

    public function __construct(float $minExclusiveValue)
    {
        $this->minExclusiveValue = $minExclusiveValue;
    }

    protected function validate(mixed $value): bool
    {
        return $value > $this->minExclusiveValue;
    }
}
