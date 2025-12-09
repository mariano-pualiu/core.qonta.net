<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\MinExclusiveNodeValue;
use Illuminate\Support\Collection;

trait GetsMinExclusiveNode
{
    public function getMinExclusiveNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof MinExclusiveNodeValue;
            })
            : null;
    }
}
