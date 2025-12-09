<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsCustomElements
{
    /**
     * @var array the customElements to be created
     */
    protected array $customElements = [];

    public function setCustomElements(array|callable $customElements = [])
    {
        $this->customElements = is_callable($customElements) ? $customElements() : $customElements;

        $this->registerReseteableParameter('customElements', __FUNCTION__);

        return $this;
    }
}
