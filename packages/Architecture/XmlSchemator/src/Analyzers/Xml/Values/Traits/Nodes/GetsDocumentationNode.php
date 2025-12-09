<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Annotation\DocumentationNodeValue;
use Illuminate\Support\Collection;

trait GetsDocumentationNode
{
    public function getDocumentationNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof DocumentationNodeValue;
            })
            : null;
    }
}
