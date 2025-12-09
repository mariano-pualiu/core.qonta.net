<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\MinInclusiveRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MinInclusiveValidation extends ValidationRule
{
    private $minInclusiveValue;

    public function __construct($minInclusiveValue)
    {
        $this->minInclusiveValue = $minInclusiveValue;
    }

    public function getRules(): array
    {
        return [new MinInclusiveRule($this->minInclusiveValue)];
    }
}
