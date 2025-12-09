<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsRestrictions
{
    /**
     * @var array the restrictions to be created
     */
    protected array $restrictions = [];

    public function setRestrictions(array $restrictions = [])
    {
        $this->restrictions = $restrictions;

        $this->registerReseteableParameter('restrictions', __FUNCTION__);

        return $this;
    }
}
