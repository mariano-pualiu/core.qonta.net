<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\NamespaceAttributeValue;
use Illuminate\Support\Collection;

trait GetsNamespaceAttribute
{
    public function getNamespaceAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof NamespaceAttributeValue;
            })
            : null;
    }
}
