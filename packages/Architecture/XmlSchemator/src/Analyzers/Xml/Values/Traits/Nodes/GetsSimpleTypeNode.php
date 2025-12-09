<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleTypeNodeValue;
use Illuminate\Support\Collection;

trait GetsSimpleTypeNode
{
    public function getSimpleTypeNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof SimpleTypeNodeValue;
            })
            : null;
    }
}
