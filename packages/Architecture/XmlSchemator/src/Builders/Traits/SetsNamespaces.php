<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsNamespaces
{
    /**
     * @var array the namespaces to be created
     */
    protected array $namespaces = [];

    public function setNamespaces(array $namespaces = [])
    {
        $this->namespaces = $namespaces;

        $this->registerReseteableParameter('namespaces', __FUNCTION__);

        return $this;
    }
}
