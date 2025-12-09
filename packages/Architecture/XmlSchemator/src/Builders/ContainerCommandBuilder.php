<?php

namespace Architecture\XmlSchemator\Builders;

use Architecture\XmlSchemator\Builders\ApiContainerCommandBuilder;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;

class ContainerCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName, Traits\SetsContainerName, Traits\SetsUiName, Traits\SetsDocVersionNumber, Traits\SetsFileName;

    const FILE_NAME = 'composer';

    /**
     * It basically creates the folder structure for a new section/container
     * and places the composer file for it.
     * @return CommandBuilder This Builder
     */
    public function runCommand()
    {
        $commandName = 'core:generate:container' . ($this->uiName ? ':'.$this->uiName : '');

        $params = [
            '--section' => $this->sectionName,
            '--container' => $this->containerName,
            // '--docversion' => $this->docVersionNumber,
            '--file' => $this->fileName ?? Self::FILE_NAME,
        ];

        // dump($params);

        $this->runStatus = Artisan::call($commandName, $params);

        return $this;
    }
}
