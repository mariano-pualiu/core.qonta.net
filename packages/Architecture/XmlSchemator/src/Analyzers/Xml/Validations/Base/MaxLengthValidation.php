<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\MaxLengthRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxLengthValidation extends ValidationRule
{
    private $maxLengthValue;

    public function __construct($maxLengthValue)
    {
        $this->maxLengthValue = $maxLengthValue;
    }

    public function getRules(): array
    {
        return [new MaxLengthRule($this->maxLengthValue)];
    }
}
