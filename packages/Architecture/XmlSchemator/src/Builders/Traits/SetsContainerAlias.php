<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsContainerAlias
{
    /**
     * @var string the alias of the container to generate the stubs
     */
    protected ?string $containerAlias = null;

    public function setContainerAlias(string $containerAlias = null)
    {
        $this->containerAlias = $containerAlias;

        $this->registerReseteableParameter('containerAlias', __FUNCTION__);

        return $this;
    }
}
