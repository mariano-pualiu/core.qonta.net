<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Names;

use ArchTech\Enums\Options;

enum ImportEnum: string
{
    use Options;

    case NAMESPACE       = 'namespace';
    case SCHEMA_LOCATION = 'schemaLocation';
}
