<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\WhitespaceRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class WhitespaceValidation extends ValidationRule
{
    private $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    public function getRules(): array
    {
        return [new WhitespaceRule($this->operation)];
    }
}
