<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits;

trait SetsXsdVersionNumber
{
    /**
     * @var string the xsdVersionNumber to be created
     */
    protected ?string $xsdVersionNumber = null;

    public function setXsdVersionNumber(string $xsdVersionNumber = Null)
    {
        $this->xsdVersionNumber = $xsdVersionNumber;

        $this->registerReseteableParameter('xsdVersionNumber', __FUNCTION__);

        return $this;
    }
}
