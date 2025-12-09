<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class SequenceNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_SEQUENCE;

    use Nodes\GetsElementNodes, Nodes\GetsAnyNodes;
}
