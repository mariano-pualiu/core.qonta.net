<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\TraverserVisitorContract;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Traversers\NodeTraverser;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;

trait TraversingXmlNode
{
	public function traverse(TraverserVisitorContract $traverser)
	{
		match ($this::NODE_NAME) {
			NodesEnum::XS_SCHEMA       => $traverser->traverseSchemaNode($this),
			NodesEnum::XS_ELEMENT      => $traverser->traverseElementNode($this),
			NodesEnum::XS_COMPLEX_TYPE => $traverser->traverseComplexTypeNode($this),

			NodesEnum::XS_SEQUENCE     => $traverser->traverseSequenceNode($this),
			NodesEnum::XS_ATTRIBUTE    => $traverser->traverseAttributeNode($this),
			NodesEnum::XS_SIMPLE_TYPE  => $traverser->traverseSimpleTypeNode($this),
			NodesEnum::XS_RESTRICTION  => $traverser->traverseRestrictionNode($this),
			default => null,
		};

		return $this;
	}
}
