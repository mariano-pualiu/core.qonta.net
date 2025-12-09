<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\FractionDigitsRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class FractionDigitsValidation extends ValidationRule
{
    private $numberOfDigits;

    public function __construct($numberOfDigits)
    {
        $this->numberOfDigits = $numberOfDigits;
    }

    public function getRules(): array
    {
        return [new FractionDigitsRule($this->numberOfDigits)];
    }
}
