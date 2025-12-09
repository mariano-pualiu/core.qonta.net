<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Nodes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\FractionDigitsNodeValue;
use Illuminate\Support\Collection;

trait GetsFractionDigitsNode
{
    public function getFractionDigitsNode()
    {
        return $this->content instanceof Collection
            ? $this->content->first(function ($node) {
                return $node instanceof FractionDigitsNodeValue;
            })
            : null;
    }
}
