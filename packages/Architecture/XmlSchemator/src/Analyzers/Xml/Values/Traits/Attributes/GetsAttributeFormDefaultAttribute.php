<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\AttributeFormDefaultAttributeValue;
use Illuminate\Support\Collection;

trait GetsAttributeFormDefaultAttribute
{
    public function getAttributeFormDefaultAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof AttributeFormDefaultAttributeValue;
            })
            : null;
    }
}
