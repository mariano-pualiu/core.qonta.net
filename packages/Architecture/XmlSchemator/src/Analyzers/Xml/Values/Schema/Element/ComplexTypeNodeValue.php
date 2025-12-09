<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Element;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class ComplexTypeNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_COMPLEX_TYPE;

    use Nodes\GetsSequenceNode, Nodes\GetsAttributeNodes;
}
