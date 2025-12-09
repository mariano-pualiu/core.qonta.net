<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsStubName
{
    /**
     * @var string the stub file to load for this generator.
     */
    protected ?string $stubName = null;

    public function setStubName(string $stubName = null)
    {
        $this->stubName = $stubName;

        $this->registerReseteableParameter('stubName', __FUNCTION__);

        return $this;
    }
}
