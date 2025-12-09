<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsTraits
{
    /**
     * @var array the traits to be created
     */
    protected array $traits = [];

    public function setTraits(array $traits = [])
    {
        $this->traits = $traits;

        $this->registerReseteableParameter('traits', __FUNCTION__);

        return $this;
    }
}
