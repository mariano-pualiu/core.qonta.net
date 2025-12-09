<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\MinLengthNodeValue;
use Illuminate\Support\Collection;

trait GetsMinLengthNode
{
    public function getMinLengthNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof MinLengthNodeValue;
            })
            : null;
    }
}
