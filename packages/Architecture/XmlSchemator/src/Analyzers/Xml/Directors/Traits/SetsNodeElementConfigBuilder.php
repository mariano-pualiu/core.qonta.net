<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Configs\ElementCommandBuilder;

trait SetsNodeElementConfigBuilder
{
    /**
     * @var ValueCommandBuilder
     */
    protected $elementNodeConfigBuilder;

    /**
     * @param ValueCommandBuilder $elementNodeConfigBuilder
     *
     * @return $this
     */
    public function setElementNodeConfigBuilder(ElementCommandBuilder $elementNodeConfigBuilder)
    {
        $this->elementNodeConfigBuilder = $elementNodeConfigBuilder;

        return $this;
    }
}
