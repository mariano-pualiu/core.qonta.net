<?php

namespace Architecture\XmlSchemator\Directors;

use Architecture\XmlSchemator\Analyzers\Xml;
use Architecture\XmlSchemator\Builders;
use Architecture\XmlSchemator\Directors\Traits;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class XsdContainerBuilderDirector
{
    use Traits\SetsXsdStructureBuilder,
        Traits\SetsConfigsBuilder,
        Traits\SetsSchemaBuilder,
        Traits\SetsMappingBuilder,
        Traits\SetsValuesBuilder,
        Traits\SetsModelsBuilder,
        Traits\SetsTransformersBuilder,
        Traits\SetsEnumsBuilder;

    protected $xsdStructure = null;

    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData
    )
    {
        $this->setXsdStructureBuilder(new Xml\Builders\XsdStructureCommandBuilder());

        $this->setConfigsBuilder(new Xml\Builders\XsdConfigsCommandBuilder());

        $this->setSchemaBuilder(new Xml\Builders\XsdSchemaCommandBuilder());

        $this->setMappingBuilder(new Xml\Builders\XsdMappingCommandBuilder());

        $this->setValuesBuilder(new Xml\Builders\XsdValuesCommandBuilder());

        $this->setModelsBuilder(new Xml\Builders\XsdModelsCommandBuilder());

        $this->setTransformersBuilder(new Xml\Builders\XsdTransformersCommandBuilder());

        $this->setEnumsBuilder(new Xml\Builders\XsdEnumsCommandBuilder());
    }

    public function buildContainer()
    {
        return $this->containerBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setUiName(config('architecture-xmlSchemator.core.ui_type', 'api'))
            // ->setDocVersionNumber(config('architecture-xmlSchemator.core.doc_version'))
            ->runCommand();
    }

    public function buildXsdStructure(string $filePath)
    {
        return $this->xsdStructureBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setFilePath($filePath)
            ->runCommand();
    }

    public function buildConfigs()
    {
        // dd($this->xsdStructureBuilder->xsdStructure);
        return $this->configsBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildSchema()
    {
        // dd($this->xsdStructureBuilder->xsdStructure);
        return $this->schemaBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildMapping()
    {
        // TODO: remove previously generated mapping files
        // dd($this->xsdStructureBuilder->xsdStructure);
        return $this->mappingBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildValues()
    {
        return $this->valuesBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildModels()
    {
        return $this->modelsBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildTransformers()
    {
        return $this->transformersBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildEnums()
    {
        return $this->enumsBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->setXsdStructure($this->xsdStructureBuilder->xsdStructure)
            ->runCommand();
    }

    public function buildServiceProvider()
    {
        return $this->serviceProviderBuilder
            ->reset()
            ->setBuilderDirectorData($this->builderDirectorData)
            ->runCommand();
    }
}
