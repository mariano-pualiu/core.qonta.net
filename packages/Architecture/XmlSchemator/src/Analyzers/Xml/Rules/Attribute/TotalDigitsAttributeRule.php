<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the exact number of digits allowed. Must be greater than zero
 */
class TotalDigitsAttributeRule extends AttributeRule
{
    private int $totalDigits;

    public function __construct(int $totalDigits)
    {
        $this->totalDigits = $totalDigits;
    }

    protected function validate(mixed $value): bool
    {
        return $value > $this->totalDigits;
    }
}
