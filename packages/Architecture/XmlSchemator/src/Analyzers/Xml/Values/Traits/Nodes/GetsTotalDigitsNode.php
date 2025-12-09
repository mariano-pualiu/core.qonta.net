<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\TotalDigitsNodeValue;
use Illuminate\Support\Collection;

trait GetsTotalDigitsNode
{
    public function getTotalDigitsNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof TotalDigitsNodeValue;
            })
            : null;
    }
}
