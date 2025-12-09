<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values;

use ArchTech\Enums\Options;

enum UseEnum: string
{
    use Options;

    case REQUIRED = 'required';
    case OPTIONAL = 'optional';
}
