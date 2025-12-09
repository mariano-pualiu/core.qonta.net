<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\MinExclusiveRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MinExclusiveValidation extends ValidationRule
{
    private $minExclusiveValue;

    public function __construct($minExclusiveValue)
    {
        $this->minExclusiveValue = $minExclusiveValue;
    }

    public function getRules(): array
    {
        return [new MinExclusiveRule($this->minExclusiveValue)];
    }
}
