<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\TypeAttributeValue;
use Illuminate\Support\Collection;

trait GetsTypeAttribute
{
    public function getTypeAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof TypeAttributeValue;
            })
            : null;
    }
}
