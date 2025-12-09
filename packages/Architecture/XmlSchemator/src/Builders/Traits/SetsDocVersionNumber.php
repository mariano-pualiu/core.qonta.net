<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsDocVersionNumber
{
    /**
     * @var string the version of the endpoint (1, 2, ...)
     */
    protected ?int $docVersionNumber = null;

    public function setDocVersionNumber(int $docVersionNumber = null)
    {
        $this->docVersionNumber = $docVersionNumber;

        $this->registerReseteableParameter('docVersionNumber', __FUNCTION__);

        return $this;
    }
}
