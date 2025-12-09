<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class SimpleTypeNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_SIMPLE_TYPE;

    use Nodes\GetsRestrictionNode;
}
