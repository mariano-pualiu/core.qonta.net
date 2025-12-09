<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\MaxExclusiveRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxExclusiveValidation extends ValidationRule
{
    private $maxExclusiveValue;

    public function __construct($maxExclusiveValue)
    {
        $this->maxExclusiveValue = $maxExclusiveValue;
    }

    public function getRules(): array
    {
        return [new MaxExclusiveRule($this->maxExclusiveValue)];
    }
}
