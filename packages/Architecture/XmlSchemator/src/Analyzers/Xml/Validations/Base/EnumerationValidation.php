<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations\Base;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\EnumerationRule;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class EnumerationValidation extends ValidationRule
{
    private $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function getRules(): array
    {
        return [new EnumerationRule($this->options)];
    }
}
