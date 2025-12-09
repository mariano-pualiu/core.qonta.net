<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\RestrictionsEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class EnumerationNodeValue extends XmlNodeValue
{
    const NODE_NAME = RestrictionsEnum::XS_ENUMERATION;
}
