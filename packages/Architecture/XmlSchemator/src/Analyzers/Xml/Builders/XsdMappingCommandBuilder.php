<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdStructure;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters\MappingFileExporter;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Traversers\NodeTraverser;
use Architecture\XmlSchemator\Builders\Traits\SetsBuilderDirectorData;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Sabre\Xml\Reader;
use Sabre\Xml\Service;

class XsdMappingCommandBuilder extends CommandBuilder
{
    use SetsBuilderDirectorData, SetsXsdStructure;

    const FILE_NAME = 'Mappings';

    public function runCommand()
    {
        $valueClassExporter = new MappingFileExporter($this->builderDirectorData);

        $mappingNode = $this->xsdStructure;

        $nodeTraverser = new NodeTraverser($this->builderDirectorData, $valueClassExporter);

        $nodeTraverser->traverseSchemaNode($mappingNode);
    }
}
