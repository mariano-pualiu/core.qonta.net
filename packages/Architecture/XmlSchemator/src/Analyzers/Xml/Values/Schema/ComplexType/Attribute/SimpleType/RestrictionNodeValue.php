<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class RestrictionNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_RESTRICTION;

    use Attributes\GetsBaseAttribute;

    use Nodes\GetsWhiteSpaceNode,
        Nodes\GetsLengthNode,
        Nodes\GetsMinLengthNode,
        Nodes\GetsMaxLengthNode,
        Nodes\GetsPatternNode,
        Nodes\GetsFractionDigitsNode,
        Nodes\GetsMinInclusiveNode,
        Nodes\GetsMaxInclusiveNode,
        Nodes\GetsMinExclusiveNode,
        Nodes\GetsMaxExclusiveNode,
        Nodes\GetsEnumerationNodes,
        Traits\GetsValueNodesAsCollectionNodes,
        Nodes\GetsTotalDigitsNode;
}
