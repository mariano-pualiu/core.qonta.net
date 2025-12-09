<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdStructureCommandBuilder;

trait SetsXsdStructureBuilder
{
    /**
     * @var XsdXsdStructureCommandBuilder
     */
    protected $xsdStructureBuilder;

    /**
     * @param XsdStructureCommandBuilder $xsdStructureBuilder
     *
     * @return $this
     */
    public function setXsdStructureBuilder(XsdStructureCommandBuilder $xsdStructureBuilder)
    {
        $this->xsdStructureBuilder = $xsdStructureBuilder;

        return $this;
    }
}
