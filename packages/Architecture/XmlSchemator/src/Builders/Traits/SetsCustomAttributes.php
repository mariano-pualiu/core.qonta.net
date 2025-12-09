<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsCustomAttributes
{
    /**
     * @var array the customAttributes to be created
     */
    protected array $customAttributes = [];

    public function setCustomAttributes(array|callable $customAttributes = [])
    {
        $this->customAttributes = is_callable($customAttributes) ? $customAttributes() : $customAttributes;

        $this->registerReseteableParameter('customAttributes', __FUNCTION__);

        return $this;
    }
}
