<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsCollectionName
{
    /**
     * @var string the name of the collection to generate the stubs for
     */
    protected ?string $collectionName = null;

    public function setCollectionName(string $collectionName = null)
    {
        $this->collectionName = $collectionName;

        $this->registerReseteableParameter('collectionName', __FUNCTION__);

        return $this;
    }
}
