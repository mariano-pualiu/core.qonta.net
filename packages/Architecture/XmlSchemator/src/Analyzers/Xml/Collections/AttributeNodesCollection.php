<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Collections;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\AttributeNodeValue;
use Illuminate\Database\Eloquent\Collection;

class AttributeNodesCollection extends Collection
{
    public function mapIntoCommandConfig()
    {
        return $this
            ->keyBy(fn (AttributeNodeValue $attributeNode) => $attributeNode?->getNameAttributeValue()?->value)
            ->map(fn (AttributeNodeValue $attributeNode) => collect([
                'classNamespacePath' => $attributeNode->getClassNamespacePath(),
                'attributes'         => $attributeNode->attributes->asKeyValue(),
                'annotation'         => $attributeNode->getAnnotationNode()?->getDocumentationNode()?->content,
                'base'               => $attributeNode->getSimpleTypeNode()?->getRestrictionNode()?->getBaseAttributeValue()->value,
                'restrictions'       => $attributeNode->getSimpleTypeNode()?->getRestrictionNode()?->content?->mapWithKeys(fn ($ruleNode) => [$ruleNode->name => $ruleNode->getValueAttributeValue()->value])
            ]));
    }
}
