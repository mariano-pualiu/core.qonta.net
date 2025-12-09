<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\MinInclusiveNodeValue;
use Illuminate\Support\Collection;

trait GetsMinInclusiveNode
{
    public function getMinInclusiveNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof MinInclusiveNodeValue;
            })
            : null;
    }
}
