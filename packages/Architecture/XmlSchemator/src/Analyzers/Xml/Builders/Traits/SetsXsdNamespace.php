<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits;

trait SetsXsdNamespace
{
    /**
     * @var string the xsdNamespace to be created
     */
    protected ?string $xsdNamespace = null;

    public function setXsdNamespace(string $xsdNamespace = null)
    {
        $this->xsdNamespace = $xsdNamespace;

        $this->registerReseteableParameter('xsdNamespace', __FUNCTION__);

        return $this;
    }
}
