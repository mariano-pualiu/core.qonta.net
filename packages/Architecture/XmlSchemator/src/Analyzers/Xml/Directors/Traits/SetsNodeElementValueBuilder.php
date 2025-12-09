<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Values\ElementCommandBuilder;

// trait that sets $nodeValueBuilder property of ValueCommandBuilder class and setter returns $this
trait SetsNodeElementValueBuilder
{
    /**
     * @var ValueCommandBuilder
     */
    protected $elementNodeValueBuilder;

    /**
     * @param ValueCommandBuilder $elementNodeValueBuilder
     *
     * @return $this
     */
    public function setElementNodeValueBuilder(ElementCommandBuilder $elementNodeValueBuilder)
    {
        $this->elementNodeValueBuilder = $elementNodeValueBuilder;

        return $this;
    }
}
