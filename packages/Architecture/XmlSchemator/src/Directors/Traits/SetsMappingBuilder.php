<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdMappingCommandBuilder;

// trait that sets $mappingBuilder property of XsdMappingCommandBuilder class and setter returns $this
trait SetsMappingBuilder
{
    /**
     * @var XsdMappingCommandBuilder
     */
    protected $mappingBuilder;

    /**
     * @param XsdMappingCommandBuilder $mappingBuilder
     *
     * @return $this
     */
    public function setMappingBuilder(XsdMappingCommandBuilder $mappingBuilder)
    {
        $this->mappingBuilder = $mappingBuilder;

        return $this;
    }
}
