<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\MinLengthRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MinLengthValidation extends ValidationRule
{
    private $minLengthValue;

    public function __construct($minLengthValue)
    {
        $this->minLengthValue = $minLengthValue;
    }

    public function getRules(): array
    {
        return [new MinLengthRule($this->minLengthValue)];
    }
}
