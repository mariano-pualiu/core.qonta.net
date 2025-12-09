<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsMethods
{
    /**
     * @var array the methods to be created
     */
    protected array $methods = [];

    public function setMethods(array $methods = [])
    {
        $this->methods = $methods;

        $this->registerReseteableParameter('methods', __FUNCTION__);

        return $this;
    }
}
