<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Annotation;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

class DocumentationNodeValue extends XmlNodeValue
{
    const NODE_NAME = NodesEnum::XS_DOCUMENTATION;
}
