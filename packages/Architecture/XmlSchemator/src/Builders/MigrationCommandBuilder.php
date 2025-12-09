<?php

namespace Architecture\XmlSchemator\Builders;

use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;
use Illuminate\Support\Str;

class MigrationCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName, Traits\SetsContainerName, Traits\SetsModelName, Traits\SetsCollectionName, Traits\SetsFileName, Traits\SetsTableName, Traits\SetsDocVersionNumber;

    const FILE_NAME = 'Migration';

    public function runCommand()
    {
        $fileName = 'create_' . $this->tableName . '_table';

        $this->runStatus = Artisan::call('catalogos:generate:migration', [
            '--section' => $this->sectionName,
            '--container' => $this->containerName,
            '--model' => $this->modelName,
            '--collection' => $this->collectionName,
            '--tablename' => $this->tableName,
            '--file' => $fileName,
            '--docversion' => $this->docVersionNumber,
        ]);
    }
}
