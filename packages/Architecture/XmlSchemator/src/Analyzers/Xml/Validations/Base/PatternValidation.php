<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\PatternRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class PatternValidation extends ValidationRule
{
    private $pattern;

    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    public function getRules(): array
    {
        return [new PatternRule($this->pattern)];
    }
}
