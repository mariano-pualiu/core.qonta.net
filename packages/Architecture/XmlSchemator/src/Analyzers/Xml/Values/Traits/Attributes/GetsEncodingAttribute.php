<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\EncodingAttributeValue;
use Illuminate\Support\Collection;

trait GetsEncodingAttribute
{
    public function getEncodingAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof EncodingAttributeValue;
            })
            : null;
    }
}
