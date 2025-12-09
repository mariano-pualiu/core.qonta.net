<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;

interface SimpleTypeEnumContract
{
    // public function annotation(): string;

    public function base(): BaseEnum;

    public function restrictionRules(): array;
}
