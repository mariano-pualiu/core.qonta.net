<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdValuesCommandBuilder;

// trait that sets $valuesBuilder property of XsdValuesCommandBuilder class and setter returns $this
trait SetsValuesBuilder
{
    /**
     * @var XsdValuesCommandBuilder
     */
    protected $valueBuilder;

    /**
     * @param XsdValuesCommandBuilder $valueBuilder
     *
     * @return $this
     */
    public function setValuesBuilder(XsdValuesCommandBuilder $valuesBuilder)
    {
        $this->valuesBuilder = $valuesBuilder;

        return $this;
    }
}
