<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Values\AttributeCommandBuilder;

// trait that sets $nodeValueBuilder property of ValueCommandBuilder class and setter returns $this
trait SetsNodeAttributeValueBuilder
{
    /**
     * @var ValueCommandBuilder
     */
    protected $attributeNodeValueBuilder;

    /**
     * @param ValueCommandBuilder $attributeNodeValueBuilder
     *
     * @return $this
     */
    public function setAttributeNodeValueBuilder(AttributeCommandBuilder $attributeNodeValueBuilder)
    {
        $this->attributeNodeValueBuilder = $attributeNodeValueBuilder;

        return $this;
    }
}
