<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\MaxLengthNodeValue;
use Illuminate\Support\Collection;

trait GetsMaxLengthNode
{
    public function getMaxLengthNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof MaxLengthNodeValue;
            })
            : null;
    }
}
