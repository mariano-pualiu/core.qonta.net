<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Sequence\AnyNodeValue;
use Illuminate\Support\Collection;

trait GetsAnyNodes
{
    public function getAnyNodes()
    {
        return $this->content instanceof Collection
            ? $this->content->filter(function ($node) {
                return $node instanceof AnyNodeValue;
            })
            : null;
    }
}
