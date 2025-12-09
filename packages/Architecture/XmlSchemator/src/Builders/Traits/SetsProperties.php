<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsProperties
{
    /**
     * @var array the properties to be created
     */
    protected array $properties = [];

    public function setProperties(array $properties = [])
    {
        $this->properties = $properties;

        $this->registerReseteableParameter('properties', __FUNCTION__);

        return $this;
    }
}
