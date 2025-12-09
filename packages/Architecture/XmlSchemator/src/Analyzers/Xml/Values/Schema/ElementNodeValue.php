<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class ElementNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_ELEMENT;

    use Attributes\GetsNameAttribute, Attributes\GetsMinOccursAttribute, Attributes\GetsMaxOccursAttribute;
    use Nodes\GetsAnnotationNode, Nodes\GetsComplexTypeNode;
}
