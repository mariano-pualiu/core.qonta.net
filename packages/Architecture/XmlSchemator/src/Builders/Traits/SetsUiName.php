<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsUiName
{
    /**
     * @var string the name of the ui to generate the stubs/Controller for
     */
    protected ?string $uiName = null;

    public function setUiName(?string $uiName = null)
    {
        $this->uiName = $uiName;

        $this->registerReseteableParameter('uiName', __FUNCTION__);

        return $this;
    }
}
