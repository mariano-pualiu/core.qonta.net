<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\WhiteSpaceEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;

/**
 * Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
 */
class WhiteSpaceAttributeRule extends AttributeRule
{
    private WhiteSpaceEnum $operation;

    private int $length;
    private array $cfdiAttributeEnums;

    public function __construct(string $operation, ...$cfdiAttributeEnums)
    {
        $this->operation = WhiteSpaceEnum::from($operation);
        $this->cfdiAttributeEnums = $cfdiAttributeEnums;
    }

    protected function validate(mixed $value): bool
    {
        $this->value = match ($this->operation) {
            WhiteSpaceEnum::COLLAPSE => trim($value),
            default => $this->value,
        };

        return true;
    }
}
