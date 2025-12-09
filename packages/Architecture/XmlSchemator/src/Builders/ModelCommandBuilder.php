<?php

namespace Architecture\XmlSchemator\Builders;

use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;
use Illuminate\Support\Arr;

class ModelCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName, Traits\SetsContainerName, Traits\SetsModelName, Traits\SetsCollectionName, Traits\SetsFileName, Traits\SetsProperties, Traits\SetsNamespace, Traits\SetsMethods, Traits\SetsAttributes, Traits\SetsElements;

    const FILE_NAME = 'Model';

    public function runCommand()
    {
        $this->runStatus = Artisan::call('core:generate:model', [
            '--section'    => $this->sectionName,
            '--container'  => $this->containerName,
            '--model'      => $this->modelName,
            '--namespace'  => $this->namespace,
            '--collection' => $this->collectionName,
            '--file'       => $this->fileName ?? $this->modelName ?? Self::FILE_NAME,
            '--elements'   => json_encode($this->elements),
            '--attributes' => json_encode($this->attributes),
            '--properties' => json_encode($this->properties),
            '--methods'    => json_encode($this->methods),
        ]);
    }
}
