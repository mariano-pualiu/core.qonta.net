<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\RestrictionsNodeEnumCommandBuilder;

// trait that sets $nodeValueBuilder property of ValueCommandBuilder class and setter returns $this
trait SetsNodeRestrictionsEnumBuilder
{
    /**
     * @var ValueCommandBuilder
     */
    protected $restrictionsNodeEnumBuilder;

    /**
     * @param ValueCommandBuilder $restrictionsNodeEnumBuilder
     *
     * @return $this
     */
    public function setRestrictionsNodeEnumBuilder(RestrictionsNodeEnumCommandBuilder $restrictionsNodeEnumBuilder)
    {
        $this->restrictionsNodeEnumBuilder = $restrictionsNodeEnumBuilder;

        return $this;
    }
}
