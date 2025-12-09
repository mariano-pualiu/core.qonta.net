<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdEnumsCommandBuilder;

// trait that sets $enumsBuilder property of EnumsCommandBuilder class and setter returns $this
trait SetsEnumsBuilder
{
    /**
     * @var EnumsCommandBuilder
     */
    protected $enumsBuilder;

    /**
     * @param EnumsCommandBuilder $enumsBuilder
     *
     * @return $this
     */
    public function setEnumsBuilder(XsdEnumsCommandBuilder $enumsBuilder)
    {
        $this->enumsBuilder = $enumsBuilder;

        return $this;
    }
}
