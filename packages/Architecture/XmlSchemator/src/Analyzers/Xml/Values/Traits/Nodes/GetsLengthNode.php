<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\LengthNodeValue;
use Illuminate\Support\Collection;

trait GetsLengthNode
{
    public function getLengthNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof LengthNodeValue;
            })
            : null;
    }
}
