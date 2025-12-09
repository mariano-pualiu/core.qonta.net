<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\TotalDigitsRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class TotalDigitsValidation extends ValidationRule
{
    private $totalDigits;

    public function __construct($totalDigits)
    {
        $this->totalDigits = $totalDigits;
    }

    public function getRules(): array
    {
        return [new TotalDigitsRule($this->totalDigits)];
    }
}
