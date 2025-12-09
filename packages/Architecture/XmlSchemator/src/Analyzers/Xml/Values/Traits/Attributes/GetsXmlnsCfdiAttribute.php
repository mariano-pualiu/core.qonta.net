<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\XmlnsCfdiAttributeValue;
use Illuminate\Support\Collection;

trait GetsXmlnsCfdiAttribute
{
    public function getXmlnsCfdiAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof XmlnsCfdiAttributeValue;
            })
            : null;
    }
}
