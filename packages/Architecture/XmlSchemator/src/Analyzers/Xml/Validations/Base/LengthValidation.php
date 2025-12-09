<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\LengthRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class LengthValidation extends ValidationRule
{
    private $length;

    public function __construct($length)
    {
        $this->length = $length;
    }

    public function getRules(): array
    {
        return [new LengthRule($this->length)];
    }
}
