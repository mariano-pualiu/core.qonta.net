<?php

namespace Architecture\XmlSchemator\Directors;

use Architecture\XmlSchemator\Analyzers\Xml;
use Architecture\XmlSchemator\Builders;
use Architecture\XmlSchemator\Directors\Traits;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ApiContainerBuilderDirector
{
    use Traits\SetsContainerBuilder,
        Traits\SetsServiceProviderBuilder;

    protected $xsdStructure = null;

    public function __construct(
        public string $sectionName,
        public string $containerName,
    )
    {
        $this->setContainerBuilder(new Builders\ContainerCommandBuilder());

        $this->setServiceProviderBuilder(new Builders\ServiceProviderCommandBuilder());
    }

    public function buildContainer()
    {
        return $this->containerBuilder
            ->reset()
            ->setSectionName($this->sectionName)
            ->setContainerName($this->containerName)
            ->setUiName(config('architecture-xmlSchemator.core.ui_type', 'api'))
            // ->setDocVersionNumber(config('architecture-xmlSchemator.core.doc_version'))
            ->runCommand();
    }

    public function buildServiceProvider()
    {
        return $this->serviceProviderBuilder
            ->reset()
            ->setSectionName($this->sectionName)
            ->setContainerName($this->containerName)
            ->runCommand();
    }
}
