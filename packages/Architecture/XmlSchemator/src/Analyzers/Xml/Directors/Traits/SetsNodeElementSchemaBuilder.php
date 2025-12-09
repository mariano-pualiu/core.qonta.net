<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Schemas;

trait SetsNodeElementSchemaBuilder
{
    /**
     * @var ValueCommandBuilder
     */
    protected $elementNodeSchemaBuilder;

    /**
     * @param ValueCommandBuilder $elementNodeSchemaBuilder
     *
     * @return $this
     */
    public function setElementNodeSchemaBuilder(Schemas\ElementCommandBuilder $elementNodeSchemaBuilder)
    {
        $this->elementNodeSchemaBuilder = $elementNodeSchemaBuilder;

        return $this;
    }
}
