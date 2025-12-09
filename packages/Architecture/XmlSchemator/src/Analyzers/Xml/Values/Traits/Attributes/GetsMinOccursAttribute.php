<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\MinOccursAttributeValue;
use Illuminate\Support\Collection;

trait GetsMinOccursAttribute
{
    public function getMinOccursAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof MinOccursAttributeValue;
            })
            : null;
    }
}
