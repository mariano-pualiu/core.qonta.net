<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsClassNamespacePath
{
    /**
     * @var string the classNamespacePath to be created
     */
    protected ?string $classNamespacePath = null;

    public function setClassNamespacePath(string $classNamespacePath = null)
    {
        $this->classNamespacePath = $classNamespacePath;

        $this->registerReseteableParameter('classNamespacePath', __FUNCTION__);

        return $this;
    }
}
