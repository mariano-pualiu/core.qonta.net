<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsAnnotation
{
    /**
     * @var string the annotation to be created
     */
    protected ?string $annotation = null;

    public function setAnnotation(string $annotation = null)
    {
        $this->annotation = $annotation;

        $this->registerReseteableParameter('annotation', __FUNCTION__);

        return $this;
    }
}
