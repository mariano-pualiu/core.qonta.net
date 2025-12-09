<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\AttributeNodesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\AttributeNodeValue;
use Illuminate\Support\Collection;

trait GetsAttributeNodes
{
    public function getAttributeNodes()
    {
        return $this->content instanceof Collection
            ? new AttributeNodesCollection($this->content->filter(function ($node) {
                return $node instanceof AttributeNodeValue;
            }))
            : null;
    }
}
