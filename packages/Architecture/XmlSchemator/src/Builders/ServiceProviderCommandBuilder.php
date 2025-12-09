<?php

namespace Architecture\XmlSchemator\Builders;

use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;

class ServiceProviderCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName, Traits\SetsContainerName, Traits\SetsFileName;

    const FILE_NAME = 'ServiceProvider';

    public function runCommand()
    {
        $params = [
            '--section' => $this->sectionName,
            '--container' => $this->containerName,
            '--file' => $this->fileName ?? 'MainServiceProvider',
            // '--stub' => $this->stubName ?? 'mainserviceprovider',
        ];

        dd($params);

        $this->runStatus = Artisan::call('core:generate:serviceprovider', );

        return $this;
    }
}
