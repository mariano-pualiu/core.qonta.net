<?php

namespace Architecture\XmlSchemator\Builders\Enums;

use ArchTech\Enums\Options;

enum StringFormatEnum: string
{
    use Options;

    case STRING_ORIGINAL      = 'original';     // old name
    case STRING_LOWER_FORMAT  = 'lowerformat';  // old _name
    case STRING_UPPER_FORMAT  = 'UPPERFORMAT';  // old NAME
    case STRING_SNAKE_FORMAT  = 'snake_format'; // old ~name
    case STRING_KEBAB_FORMAT  = 'kebab-format'; // old ^name
    case STRING_STUDLY_FORMAT = 'StudlyFormat'; // old Name
    case STRING_TITLE_FORMAT  = 'Title Format'; // old %name
    case STRING_JSON          = 'json'; // old %name
    case STRING_ARRAY         = 'array'; // old %name
    case STRING_OBJECT        = 'object'; // old %name
}
