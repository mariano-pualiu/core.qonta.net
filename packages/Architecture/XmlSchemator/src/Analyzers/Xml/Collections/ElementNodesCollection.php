<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Collections;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Illuminate\Database\Eloquent\Collection;

class ElementNodesCollection extends Collection
{
    public function mapIntoCommandConfig()
    {
        return $this
            ->keyBy(fn (ElementNodeValue $elementNode) => $elementNode->getNameAttributeValue()?->value)
            ->map(fn (ElementNodeValue $elementNode) => $elementNode->attributes
                ->exceptName()
                ->map(fn ($attributeValue) => $attributeValue->value)
                ->put('xsdNamespace', $elementNode->namespace)
                ->put('classNamespacePath', $elementNode->getClassNamespacePath())
                ->put('children_element_nodes_count', $elementNode->getComplexTypeNode()?->getSequenceNode()?->getElementNodes()->count() ?? 0)
            );
    }
}
