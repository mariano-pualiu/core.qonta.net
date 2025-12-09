<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types\TdCFDIEnum;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute(Attribute::TARGET_PROPERTY)]
class TdCFDIValidation extends ValidationRule
{
    public function __construct(
        public TdCFDIEnum $propertyType
    )
    {}

    public function getRules(): array
    {
        return $this->propertyType->restrictionRules();
    }
}
