<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class AttributeNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_ATTRIBUTE;

    use Attributes\GetsNameAttribute, Attributes\GetsUseAttribute, Attributes\GetsFixedAttribute, Attributes\GetsTypeAttribute;
    use Nodes\GetsAnnotationNode, Nodes\GetsSimpleTypeNode;
}
