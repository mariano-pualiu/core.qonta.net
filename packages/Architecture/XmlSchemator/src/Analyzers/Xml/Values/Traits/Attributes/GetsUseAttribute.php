<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\UseAttributeValue;
use Illuminate\Support\Collection;

trait GetsUseAttribute
{
    public function getUseAttributeValue()
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) {
                return $attribute instanceof UseAttributeValue;
            })
            : null;
    }
}
