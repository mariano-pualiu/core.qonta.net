<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\RestrictionsEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class MinInclusiveNodeValue extends XmlNodeValue
{
    const NODE_NAME = RestrictionsEnum::XS_MIN_INCLUSIVE;

    use Attributes\GetsValueAttribute;
}
