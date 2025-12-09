<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsFileName
{
    /**
     * @var string the name of the file to be created
     */
    protected ?string $fileName = null;

    public function setFileName(string $fileName = null)
    {
        $this->fileName = $fileName;

        $this->registerReseteableParameter('fileName', __FUNCTION__);

        return $this;
    }
}
