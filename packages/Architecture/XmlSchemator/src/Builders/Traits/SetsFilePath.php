<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsFilePath
{
    /**
     * @var string the path of the relevant file to process
     */
    protected ?string $filePath = null;

    public function setFilePath(string $filePath = null)
    {
        $this->filePath = $filePath;

        $this->registerReseteableParameter('filePath', __FUNCTION__);

        return $this;
    }
}
