<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsParent
{
    /**
     * @var array the parent to be created
     */
    protected ?array $parent = null;

    public function setParent(array $parent = null)
    {
        $this->parent = $parent;

        $this->registerReseteableParameter('parent', __FUNCTION__);

        return $this;
    }
}
