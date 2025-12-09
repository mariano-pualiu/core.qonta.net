<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Models\ElementCommandBuilder;

// trait that sets $nodeModelBuilder property of ElementCommandBuilder class and setter returns $this
trait SetsNodeElementModelBuilder
{
    /**
     * @var ElementCommandBuilder
     */
    protected $elementNodeModelBuilder;

    /**
     * @param ElementCommandBuilder $elementNodeModelBuilder
     *
     * @return $this
     */
    public function setElementNodeModelBuilder(ElementCommandBuilder $elementNodeModelBuilder)
    {
        $this->elementNodeModelBuilder = $elementNodeModelBuilder;

        return $this;
    }
}
