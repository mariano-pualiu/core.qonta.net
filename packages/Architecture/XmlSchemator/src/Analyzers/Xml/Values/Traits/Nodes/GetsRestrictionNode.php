<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\RestrictionNodeValue;
use Illuminate\Support\Collection;

trait GetsRestrictionNode
{
    public function getRestrictionNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof RestrictionNodeValue;
            })
            : null;
    }
}
