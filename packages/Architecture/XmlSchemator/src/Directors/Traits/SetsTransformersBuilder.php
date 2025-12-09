<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdTransformersCommandBuilder;

// trait that sets $transformersBuilder property of TransformersCommandBuilder class and setter returns $this
trait SetsTransformersBuilder
{
    /**
     * @var TransformersCommandBuilder
     */
    protected $transformersBuilder;

    /**
     * @param TransformersCommandBuilder $transformersBuilder
     *
     * @return $this
     */
    public function setTransformersBuilder(XsdTransformersCommandBuilder $transformersBuilder)
    {
        $this->transformersBuilder = $transformersBuilder;

        return $this;
    }
}
