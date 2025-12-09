<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Defines a list of acceptable values
 */
class EnumerationAttributeRule extends AttributeRule
{
    private array $options;

    public function __construct(array|string $options = [])
    {
        $this->options = $options;
    }

    protected function validate(mixed $value): bool
    {
        return is_array($this->options)
            ? in_array($value, $this->options)
            : false ?? '';
    }
}
