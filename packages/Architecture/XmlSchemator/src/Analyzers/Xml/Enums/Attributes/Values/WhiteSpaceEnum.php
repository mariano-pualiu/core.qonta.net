<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values;

use ArchTech\Enums\Options;

enum WhiteSpaceEnum: string
{
    use Options;

    case COLLAPSE = 'collapse';
}
