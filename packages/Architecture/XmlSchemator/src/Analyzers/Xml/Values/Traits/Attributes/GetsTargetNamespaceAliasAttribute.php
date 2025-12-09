<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;

// use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes\XmlnsXsAttributeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlAttributeValue;
use Illuminate\Support\Collection;

trait GetsTargetNamespaceAliasAttribute
{
    public function getTargetNamespaceAliasAttributeValue(string $xsdNamespace)
    {
        return $this->attributes instanceof Collection
            ? $this->attributes->first(function ($attribute) use ($xsdNamespace) {
                // return $attribute instanceof XmlnsXsAttributeValue && $attribute->value == $xsdNamespace;
                return $attribute instanceof XmlAttributeValue && $attribute->value == $xsdNamespace;
            })
            : null;
    }
}
