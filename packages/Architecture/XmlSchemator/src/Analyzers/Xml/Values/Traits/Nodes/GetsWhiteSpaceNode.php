<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\WhiteSpaceNodeValue;
use Illuminate\Support\Collection;

trait GetsWhiteSpaceNode
{
    public function getWhiteSpaceNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof WhiteSpaceNodeValue;
            })
            : null;
    }
}
