<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Traversers;

use Architecture\XmlSchemator\Analyzers\Xml\Values\SchemaNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\AttributeNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Element\ComplexTypeNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\TraverserVisitorContract;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * This class runs the buildNodeValue at certain specific xml/xsd nodes
 * while it is traversed by the ExportingXmlNode Exporter as ValueClass
 */
class NodeTraverser implements TraverserVisitorContract
{
    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData,
        public ExporterVisitorContract $exporter
    )
    {
    }

    /**
     * Iterates over the optional Element nodes of the root Schema and builds the appropriate Container classes
     * @param  SchemaNodeValue $schemaNode [description]
     * @return [type]                      [description]
     */
    public function traverseSchemaNode(SchemaNodeValue $schemaNode)
    {
        $schemaNode
            ->export($this->exporter)
            ->getElementNodes()
                ?->each(fn ($elementNode) => $elementNode
                    ->export($this->exporter)
                    ->getComplexTypeNode()
                    ?->traverse($this)
                );
    }

    public function traverseComplexTypeNode(ComplexTypeNodeValue $complexTypeNode)
    {
        $complexTypeNode->getAttributeNodes()
            ?->each(fn ($attributeNode) => $attributeNode->export($this->exporter));

        $complexTypeNode->getSequenceNode()?->getElementNodes()
            ?->each(fn ($elementNode) => $elementNode
                ->export($this->exporter)
                ->getComplexTypeNode()
                ?->traverse($this)
            );
    }
}
