<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsModelName
{
    /**
     * @var string the name of the model to generate the stubs for
     */
    protected ?string $modelName = null;

    public function setModelName(string|callable $modelName = null)
    {
        $this->modelName = is_callable($modelName) ? $modelName() : $modelName;

        $this->registerReseteableParameter('modelName', __FUNCTION__);

        return $this;
    }
}
