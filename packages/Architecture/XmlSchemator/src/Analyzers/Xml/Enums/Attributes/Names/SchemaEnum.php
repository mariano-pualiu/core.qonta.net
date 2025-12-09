<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Names;

use ArchTech\Enums\Options;

enum SchemaEnum: string
{
    use Options;

    case XMLNS_XS               = 'xmlns:xs';
    case XMLNS_CFDI             = 'xmlns:cfdi';
    case XMLNS_CAT_CFDI         = 'xmlns:catCfdi';
    case XMLNS_TD_CFDI          = 'xmlns:tdCfdi';
    case TARGET_NAMESPACE       = 'targetNamespace';
    case ELEMENT_FORM_DEFAULT   = 'elementFormDefault';
    case ATTRIBUTE_FORM_DEFAULT = 'attributeFormDefault';
}
