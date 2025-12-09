<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdStructure;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters\TransformerClassExporter;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Traversers\NodeTraverser;
use Architecture\XmlSchemator\Builders\Traits\SetsBuilderDirectorData;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;

class XsdTransformersCommandBuilder extends CommandBuilder
{
    use SetsBuilderDirectorData, SetsXsdStructure;

    const FILE_NAME = 'Transformers';

    public function runCommand()
    {
        $valueClassExporter = new TransformerClassExporter($this->builderDirectorData);

        $schemaNode = $this->xsdStructure;

        $nodeTraverser = new NodeTraverser($this->builderDirectorData, $valueClassExporter);

        $nodeTraverser->traverseSchemaNode($schemaNode);
    }
}
