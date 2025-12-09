<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\XsdModelsCommandBuilder;

// trait that sets $modelsBuilder property of ModelsCommandBuilder class and setter returns $this
trait SetsModelsBuilder
{
    /**
     * @var ModelsCommandBuilder
     */
    protected $modelsBuilder;

    /**
     * @param ModelsCommandBuilder $modelsBuilder
     *
     * @return $this
     */
    public function setModelsBuilder(XsdModelsCommandBuilder $modelsBuilder)
    {
        $this->modelsBuilder = $modelsBuilder;

        return $this;
    }
}
