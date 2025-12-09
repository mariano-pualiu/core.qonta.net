<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Enums\ElementCommandBuilder;

// trait that sets $nodeEnumBuilder property of ElementCommandBuilder class and setter returns $this
trait SetsNodeElementEnumBuilder
{
    /**
     * @var ElementCommandBuilder
     */
    protected $elementNodeEnumBuilder;

    /**
     * @param ElementCommandBuilder $elementNodeEnumBuilder
     *
     * @return $this
     */
    public function setElementNodeEnumBuilder(ElementCommandBuilder $elementNodeEnumBuilder)
    {
        $this->elementNodeEnumBuilder = $elementNodeEnumBuilder;

        return $this;
    }
}
