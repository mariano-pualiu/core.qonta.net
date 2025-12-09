<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\MaxOccursAttributeValue;
use Illuminate\Support\Collection;

trait GetsMaxOccursAttribute
{
    public function getMaxOccursAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof MaxOccursAttributeValue;
            })
            : null;
    }
}
