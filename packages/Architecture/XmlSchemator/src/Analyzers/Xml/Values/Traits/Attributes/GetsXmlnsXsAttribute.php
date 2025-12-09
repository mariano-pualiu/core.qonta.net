<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\XmlnsXsAttributeValue;
use Illuminate\Support\Collection;

trait GetsXmlnsXsAttribute
{
    public function getXmlnsXsAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof XmlnsXsAttributeValue;
            })
            : null;
    }
}
