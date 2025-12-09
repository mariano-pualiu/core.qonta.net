<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdConfigsCommandBuilder;

// trait that sets $configsBuilder property of XsdConfigsCommandBuilder class and setter returns $this
trait SetsConfigsBuilder
{
    /**
     * @var XsdConfigsCommandBuilder
     */
    protected $configsBuilder;

    /**
     * @param XsdConfigsCommandBuilder $configsBuilder
     *
     * @return $this
     */
    public function setConfigsBuilder(XsdConfigsCommandBuilder $configsBuilder)
    {
        $this->configsBuilder = $configsBuilder;

        return $this;
    }
}
