<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Mappings\ElementCommandBuilder;

trait SetsNodeElementMappingBuilder
{
    /**
     * @var ValueCommandBuilder
     */
    protected $elementNodeMappingBuilder;

    /**
     * @param ValueCommandBuilder $elementNodeMappingBuilder
     *
     * @return $this
     */
    public function setElementNodeMappingBuilder(ElementCommandBuilder $elementNodeMappingBuilder)
    {
        $this->elementNodeMappingBuilder = $elementNodeMappingBuilder;

        return $this;
    }
}
