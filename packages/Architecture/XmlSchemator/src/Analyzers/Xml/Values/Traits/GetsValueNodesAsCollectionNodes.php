<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\RestrictionsCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\RestrictionNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\EnumerationNodeValue;
use Illuminate\Support\Collection;

trait GetsValueNodesAsCollectionNodes
{
    public function __get($name)
    {
        match ($name) {
            'value' => match (get_class($this->value)) {
                Collection::class => $this instanceof RestrictionNodeValue
                    ? new RestrictionsCollection($this->value->items)
                    : $this->value,
                default => $this->value,
            },
            default => $this->$name,
        };
    }
}
