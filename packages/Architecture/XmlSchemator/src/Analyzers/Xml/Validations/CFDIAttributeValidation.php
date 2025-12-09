<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Validations;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Spatie\LaravelData\Support\Validation\ValidationRule;
use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class CFDIAttributeValidation extends ValidationRule
{
    public function __construct(
        public SimpleTypeEnumContract $propertyType
    )
    {}

    public function getRules(): array
    {
        return $this->propertyType->restrictionRules();
    }
}
