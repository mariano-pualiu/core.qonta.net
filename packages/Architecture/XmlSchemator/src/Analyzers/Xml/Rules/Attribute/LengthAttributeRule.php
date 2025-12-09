<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies the exact number of characters or list items allowed. Must be equal to or greater than zero
 */
class LengthAttributeRule extends AttributeRule
{
    private int $length;
    private array $cfdiAttributeEnums;

    public function __construct(int $length, ...$cfdiAttributeEnums)
    {
        $this->length = $length;
        $this->cfdiAttributeEnums = $cfdiAttributeEnums;
    }

    protected function validate(mixed $value): bool
    {
        $this->valueLength = strlen($value);
        return $this->valueLength == $this->length;
    }

    protected function message(mixed $value)
    {
        $cfdiAttributeEnums = collect($this->cfdiAttributeEnums)->pluck('value')->implode(', ');

        return "La longitud ({$this->valueLength}) del valor: '{$value}', no es exactamente igual con la logintud '{$this->length}' esperada, para el attributo: {$cfdiAttributeEnums}.";
    }
}
