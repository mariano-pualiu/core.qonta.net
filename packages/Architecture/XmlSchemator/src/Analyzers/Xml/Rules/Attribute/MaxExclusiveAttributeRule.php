<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the upper bounds for numeric values (the value must be less than this value)
 */
class MaxExclusiveAttributeRule extends AttributeRule
{
    private float $maxExclusiveValue;

    public function __construct(float $maxExclusiveValue)
    {
        $this->maxExclusiveValue = $maxExclusiveValue;
    }

    protected function validate(mixed $value): bool
    {
        return $value < $this->maxExclusiveValue;
    }
}
