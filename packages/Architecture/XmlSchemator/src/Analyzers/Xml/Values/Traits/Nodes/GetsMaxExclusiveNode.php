<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\MaxExclusiveNodeValue;
use Illuminate\Support\Collection;

trait GetsMaxExclusiveNode
{
    public function getMaxExclusiveNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof MaxExclusiveNodeValue;
            })
            : null;
    }
}
