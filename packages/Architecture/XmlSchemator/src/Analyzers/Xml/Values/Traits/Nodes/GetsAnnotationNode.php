<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\AnnotationNodeValue;
use Illuminate\Support\Collection;

trait GetsAnnotationNode
{
    public function getAnnotationNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof AnnotationNodeValue;
            })
            : null;
    }
}
