<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\SchemaLocationAttributeValue;
use Illuminate\Support\Collection;

trait GetsSchemaLocationAttribute
{
    public function getSchemaLocationAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof SchemaLocationAttributeValue;
            })
            : null;
    }
}
