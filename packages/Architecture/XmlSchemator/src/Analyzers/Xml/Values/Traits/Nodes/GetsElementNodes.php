<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\ElementNodesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Illuminate\Support\Collection;

trait GetsElementNodes
{
    public function getElementNodes()
    {
        return $this->content instanceof Collection
            ? new ElementNodesCollection($this->content->filter(function ($node) {
                return $node instanceof ElementNodeValue;
            }))
            : null;
    }
}
