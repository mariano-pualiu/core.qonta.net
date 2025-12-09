<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsContainerName
{
    /**
     * @var string the name of the container to generate the stubs
     */
    protected ?string $containerName = null;

    public function setContainerName(string|callable $containerName = null)
    {
        $this->containerName = is_callable($containerName) ? $containerName() : $containerName;

        $this->registerReseteableParameter('containerName', __FUNCTION__);

        return $this;
    }
}
