<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Names;

use ArchTech\Enums\Options;

enum XmlEnum: string
{
    use Options;

    case VERSION  = 'version';
    case ENCODING = 'encoding';
}
