<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsAttributes
{
    /**
     * @var array the attributes to be created
     */
    protected array $attributes = [];

    public function setAttributes(array|callable $attributes = [])
    {
        $this->attributes = is_callable($attributes) ? $attributes() : $attributes;

        $this->registerReseteableParameter('attributes', __FUNCTION__);

        return $this;
    }
}
