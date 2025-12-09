<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\SequenceNodeValue;
use Illuminate\Support\Collection;

trait GetsSequenceNode
{
    public function getSequenceNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof SequenceNodeValue;
            })
            : null;
    }
}
