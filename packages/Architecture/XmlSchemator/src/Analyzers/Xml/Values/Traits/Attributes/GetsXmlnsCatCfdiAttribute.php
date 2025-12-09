<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\XmlnsCatCFDIAttributeValue;
use Illuminate\Support\Collection;

trait GetsXmlnsCatCfdiAttribute
{
    public function getXmlnsCatCfdiAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof XmlnsCatCFDIAttributeValue;
            })
            : null;
    }
}
