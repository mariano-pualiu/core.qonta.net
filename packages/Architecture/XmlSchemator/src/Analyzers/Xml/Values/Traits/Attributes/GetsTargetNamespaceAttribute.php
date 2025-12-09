<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\TargetNamespaceAttributeValue;
use Illuminate\Support\Collection;

trait GetsTargetNamespaceAttribute
{
    public function getTargetNamespaceAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof TargetNamespaceAttributeValue;
            })
            : null;
    }
}
