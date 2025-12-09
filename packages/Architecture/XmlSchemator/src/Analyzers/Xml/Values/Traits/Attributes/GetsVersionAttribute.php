<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\VersionAttributeValue;
use Illuminate\Support\Collection;

trait GetsVersionAttribute
{
    public function getVersionAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof VersionAttributeValue;
            })
            : null;
    }
}
