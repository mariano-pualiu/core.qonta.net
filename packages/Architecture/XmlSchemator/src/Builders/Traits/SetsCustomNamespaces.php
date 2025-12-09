<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsCustomNamespaces
{
    /**
     * @var array the customNamespaces to be created
     */
    protected array $customNamespaces = [];

    public function setCustomNamespaces(array|callable $customNamespaces = [])
    {
        $this->customNamespaces = is_callable($customNamespaces) ? $customNamespaces() : $customNamespaces;

        $this->registerReseteableParameter('customNamespaces', __FUNCTION__);

        return $this;
    }
}
