<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Models\ElementCommandBuilder;

// trait that sets $nodeModelBuilder property of ElementCommandBuilder class and setter returns $this
trait SetsNodeElementTransformerBuilder
{
    /**
     * @var ElementCommandBuilder
     */
    protected $elementNodeTransformerBuilder;

    /**
     * @param ElementCommandBuilder $elementNodeTransformerBuilder
     *
     * @return $this
     */
    public function setElementNodeModelBuilder(ElementCommandBuilder $elementNodeTransformerBuilder)
    {
        $this->elementNodeTransformerBuilder = $elementNodeTransformerBuilder;

        return $this;
    }
}
