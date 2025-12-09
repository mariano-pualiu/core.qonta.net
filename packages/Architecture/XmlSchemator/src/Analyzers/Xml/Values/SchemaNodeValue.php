<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class SchemaNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_SCHEMA;

    use Attributes\GetsXmlnsXsAttribute,
        Attributes\GetsXmlnsCfdiAttribute,
        Attributes\GetsXmlnsCatCfdiAttribute,
        Attributes\GetsXmlnsTdCfdiAttribute,
        Attributes\GetsTargetNamespaceAttribute,
        // Attributes\GetsTargetNamespaceAliasAttribute,
        Attributes\GetsElementFormDefaultAttribute,
        Attributes\GetsAttributeFormDefaultAttribute;
    use Nodes\GetsElementNodes;
}
