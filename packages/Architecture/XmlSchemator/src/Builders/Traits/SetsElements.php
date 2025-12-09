<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsElements
{
    /**
     * @var array the elements to be created
     */
    protected array $elements = [];

    public function setElements(array $elements = [])
    {
        $this->elements = $elements;

        $this->registerReseteableParameter('elements', __FUNCTION__);

        return $this;
    }
}
