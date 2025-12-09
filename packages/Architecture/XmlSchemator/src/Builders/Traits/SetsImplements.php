<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsImplements
{
    /**
     * @var array the implements to be created
     */
    protected array $implements = [];

    public function setImplements(array $implements = [])
    {
        $this->implements = $implements;

        $this->registerReseteableParameter('implements', __FUNCTION__);

        return $this;
    }
}
