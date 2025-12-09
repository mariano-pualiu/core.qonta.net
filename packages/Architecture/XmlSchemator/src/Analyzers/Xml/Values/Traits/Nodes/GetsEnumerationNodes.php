<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\EnumerationNodeValue;
use Illuminate\Support\Collection;

trait GetsEnumerationNodes
{
    public function getEnumerationNodes()
    {
        return $this->content instanceof Collection
            ? $this->content->filter(function ($node) {
                return $node instanceof EnumerationNodeValue;
            })
            : null;

    }
}
