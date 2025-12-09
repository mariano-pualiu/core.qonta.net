<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Names;

use ArchTech\Enums\Options;

enum NodeEnum: string
{
    use Options;

    case NAME       = 'name';
    case USE        = 'use';
    case TYPE       = 'type';
    case MAX_OCCURS = 'maxOccurs';
    case MIN_OCCURS = 'minOccurs';
    case BASE       = 'base';
    case VALUE      = 'value';
    case FIXED      = 'fixed';
}
