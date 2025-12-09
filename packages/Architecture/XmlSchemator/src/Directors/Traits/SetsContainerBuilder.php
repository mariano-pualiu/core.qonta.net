<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Builders\ContainerCommandBuilder;

trait SetsContainerBuilder
{
    /**
     * @var ContainerCommandBuilder
     */
    public $containerBuilder;

    /**
     * @param ContainerCommandBuilder $containerBuilder
     *
     * @return $this
     */
    public function setContainerBuilder(ContainerCommandBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;

        return $this;
    }
}
