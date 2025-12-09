<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\FixedAttributeValue;
use Illuminate\Support\Collection;

trait GetsFixedAttribute
{
    public function getFixedAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof FixedAttributeValue;
            })
            : null;
    }
}
