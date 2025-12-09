<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;

trait SetsXsdStructure
{
    /**
     * @var string the path of the relevant file to process
     */
    protected ?XmlNodeValue $xsdStructure = null;

    public function setXsdStructure(XmlNodeValue $xsdStructure = null)
    {
        $this->xsdStructure = $xsdStructure;

        $this->registerReseteableParameter('xsdStructure', __FUNCTION__);

        return $this;
    }
}
