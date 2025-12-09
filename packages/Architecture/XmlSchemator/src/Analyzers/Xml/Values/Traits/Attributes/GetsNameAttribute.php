<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\NameAttributeValue;
use Illuminate\Support\Collection;

trait GetsNameAttribute
{
    public function getNameAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof NameAttributeValue;
            })
            : null;
    }
}
