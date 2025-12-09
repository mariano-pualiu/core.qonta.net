<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the maximum number of decimal places allowed. Must be equal to or greater than zero
 */
class FractionDigitsAttributeRule extends AttributeRule
{
    private int $numberOfDigits;

    public function __construct(int $numberOfDigits)
    {
        $this->numberOfDigits = $numberOfDigits;
    }

    protected function validate(mixed $value): bool
    {
        $fractionDigits = strrchr($value, '.');

        return !$fractionDigits ?: strlen(substr($fractionDigits, 1)) <= $this->numberOfDigits;
    }
}
