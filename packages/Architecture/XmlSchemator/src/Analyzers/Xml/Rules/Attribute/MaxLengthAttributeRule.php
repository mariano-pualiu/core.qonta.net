<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the maximum number of characters or list items allowed. Must be equal to or greater than zero
 */
class MaxLengthAttributeRule extends AttributeRule
{
    private int $maxLength;

    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
    }

    protected function validate(mixed $value): bool
    {
        return match (gettype($value)) {
            'string' => strlen($value) <= $this->maxLength,
            'array' => count($value) <= $this->maxLength,
            default => false,
        };
    }
}
