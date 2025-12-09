<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents\AttributeRule;
use Illuminate\Support\Str;

/**
 * Defines the exact sequence of characters that are acceptable
 */
class PatternAttributeRule extends AttributeRule
{
    private string $pattern;
    private array $cfdiAttributeEnums;

    public function __construct(string $pattern, ...$cfdiAttributeEnums)
    {
        $this->pattern = Str::of($pattern)->wrap('/')->toString();
        $this->cfdiAttributeEnums = $cfdiAttributeEnums;
    }

    protected function validate(mixed $value): bool
    {
        return preg_match($this->pattern, $value) === 1;
    }

    protected function message(mixed $value)
    {
        $cfdiAttributeEnums = collect($this->cfdiAttributeEnums)->pluck('value')->implode(', ');
        return "El valor: '{$value}', no es compatible con la expresión regular '{$this->pattern}', para el attributo: {$cfdiAttributeEnums}.";
    }
}
