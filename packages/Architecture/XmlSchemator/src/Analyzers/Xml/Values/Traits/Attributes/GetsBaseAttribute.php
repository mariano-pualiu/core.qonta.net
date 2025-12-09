<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\BaseAttributeValue;
use Illuminate\Support\Collection;

trait GetsBaseAttribute
{
    public function getBaseAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof BaseAttributeValue;
            })
            : null;
    }
}
