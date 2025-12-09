<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\MaxInclusiveNodeValue;
use Illuminate\Support\Collection;

trait GetsMaxInclusiveNode
{
    public function getMaxInclusiveNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof MaxInclusiveNodeValue;
            })
            : null;
    }
}
