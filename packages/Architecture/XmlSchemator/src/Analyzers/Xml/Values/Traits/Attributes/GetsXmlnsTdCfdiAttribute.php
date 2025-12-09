<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\XmlnsTdCFDIAttributeValue;
use Illuminate\Support\Collection;

trait GetsXmlnsTdCfdiAttribute
{
    public function getXmlnsTdCfdiAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof XmlnsTdCFDIAttributeValue;
            })
            : null;
    }
}
