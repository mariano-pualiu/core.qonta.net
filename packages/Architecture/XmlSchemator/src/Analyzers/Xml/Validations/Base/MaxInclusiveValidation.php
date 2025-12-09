<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\MaxInclusiveRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxInclusiveValidation extends ValidationRule
{
    private $maxInclusiveValue;

    public function __construct($maxInclusiveValue)
    {
        $this->maxInclusiveValue = $maxInclusiveValue;
    }

    public function getRules(): array
    {
        return [new MaxInclusiveRule($this->maxInclusiveValue)];
    }
}
