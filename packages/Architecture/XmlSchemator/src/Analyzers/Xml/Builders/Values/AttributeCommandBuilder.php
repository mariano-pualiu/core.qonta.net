<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Values;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdVersionNumber;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;

class AttributeCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName, Traits\SetsContainerName, Traits\SetsModelName, Traits\SetsCollectionName, Traits\SetsFileName, Traits\SetsAnnotation, Traits\SetsClassNamespacePath, Traits\SetsProperties, Traits\SetsAttributes, Traits\SetsParent;

    use SetsXsdVersionNumber;

    const FILE_NAME = 'Value';

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
            '--annotation'           => json_encode($this->annotation, JSON_UNESCAPED_UNICODE),
            '--properties'           => json_encode($this->properties),
            '--parent'               => json_encode($this->parent, JSON_UNESCAPED_UNICODE),
            // '--xsd-namespace'     => $this->xsdNamespace,
            // '--restrictions'      => json_encode($this->restrictions),
            // '--attributes'        => json_encode($this->attributes),
        ];

        $this->runStatus = Artisan::call('core:xml:generate:value:node:attribute', $params);
    }
}
