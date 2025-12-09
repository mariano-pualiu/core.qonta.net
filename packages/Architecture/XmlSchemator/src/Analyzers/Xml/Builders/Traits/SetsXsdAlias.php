<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits;

trait SetsXsdAlias
{
    /**
     * @var string the xsdAlias to be created
     */
    protected ?string $xsdAlias = null;

    public function setXsdAlias(string $xsdAlias = Null)
    {
        $this->xsdAlias = $xsdAlias;

        $this->registerReseteableParameter('xsdAlias', __FUNCTION__);

        return $this;
    }
}
