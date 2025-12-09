<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\ElementFormDefaultAttributeValue;
use Illuminate\Support\Collection;

trait GetsElementFormDefaultAttribute
{
    public function getElementFormDefaultAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof ElementFormDefaultAttributeValue;
            })
            : null;
    }
}
