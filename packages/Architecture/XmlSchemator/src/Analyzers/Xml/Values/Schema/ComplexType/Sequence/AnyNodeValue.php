<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Sequence;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class AnyNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_ANY;

    use Attributes\GetsMinOccursAttribute, Attributes\GetsMaxOccursAttribute;
}
