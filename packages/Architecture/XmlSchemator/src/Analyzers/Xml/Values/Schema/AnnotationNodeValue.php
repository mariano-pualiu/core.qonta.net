<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class AnnotationNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_ANNOTATION;

    use Nodes\GetsDocumentationNode;
}
