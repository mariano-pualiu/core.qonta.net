<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\ValueAttributeValue;
use Illuminate\Support\Collection;

trait GetsValueAttribute
{
    public function getValueAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof ValueAttributeValue;
            })
            : null;
    }
}
