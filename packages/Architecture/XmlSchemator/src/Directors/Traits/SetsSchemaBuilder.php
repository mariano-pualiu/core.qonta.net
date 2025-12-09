<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdSchemaCommandBuilder;

// trait that sets $schemaBuilder property of XsdSchemasCommandBuilder class and setter returns $this
trait SetsSchemaBuilder
{
    /**
     * @var XsdSchemasCommandBuilder
     */
    protected $schemaBuilder;

    /**
     * @param XsdSchemasCommandBuilder $schemaBuilder
     *
     * @return $this
     */
    public function setSchemaBuilder(XsdSchemaCommandBuilder $schemaBuilder)
    {
        $this->schemaBuilder = $schemaBuilder;

        return $this;
    }
}
