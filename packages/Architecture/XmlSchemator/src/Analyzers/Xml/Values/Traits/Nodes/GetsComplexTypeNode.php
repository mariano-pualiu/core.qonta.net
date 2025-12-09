<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Element\ComplexTypeNodeValue;
use Illuminate\Support\Collection;

trait GetsComplexTypeNode
{
    public function getComplexTypeNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof ComplexTypeNodeValue;
            })
            : null;
    }
}
