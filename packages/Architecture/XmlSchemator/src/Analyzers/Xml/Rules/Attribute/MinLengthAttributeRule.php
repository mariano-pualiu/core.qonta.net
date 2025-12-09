<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the minimum number of characters or list items allowed. Must be equal to or greater than zero
 */
class MinLengthAttributeRule extends AttributeRule
{
    private int $minLength;

    public function __construct(int $minLength)
    {
        $this->minLength = $minLength;
    }

    protected function validate(mixed $value): bool
    {
        return match (gettype($value)) {
            'string' => strlen($value) >= $this->minLength,
            'array' => count($value) >= $this->minLength,
            default => false,
        };
    }
}
