<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\PatternNodeValue;
use Illuminate\Support\Collection;

trait GetsPatternNode
{
    public function getPatternNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof PatternNodeValue;
            })
            : null;
    }
}
