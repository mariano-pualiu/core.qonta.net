<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Enums;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdVersionNumber;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;

class ElementCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName, Traits\SetsContainerName, Traits\SetsModelName, Traits\SetsCollectionName, Traits\SetsFileName, Traits\SetsAttributes, Traits\SetsParent, Traits\SetsClassNamespacePath;

    use SetsXsdVersionNumber;

    const FILE_NAME = 'Enum';

    public function runCommand()
    {
        $params = [
            '--section'              => $this->sectionName,
            '--container'            => $this->containerName,
            '--model'                => $this->modelName,
            '--collection'           => $this->collectionName,
            '--file'                 => $this->fileName ?? $this->modelName ?? Self::FILE_NAME,
            '--class-namespace-path' => $this->classNamespacePath,
            '--xsd-version-number'   => $this->xsdVersionNumber,
            '--attributes'           => json_encode($this->attributes, JSON_UNESCAPED_UNICODE),
            '--parent'               => json_encode($this->parent, JSON_UNESCAPED_UNICODE),
        ];

        $this->runStatus = Artisan::call('core:xml:generate:enum:node:attributes', $params);
    }
}
