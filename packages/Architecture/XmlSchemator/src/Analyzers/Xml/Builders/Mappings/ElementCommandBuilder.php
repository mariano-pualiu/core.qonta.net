<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Mappings;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdNamespace;
use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdVersionNumber;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;

class ElementCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName,
        Traits\SetsContainerName,
        Traits\SetsContainerAlias,
        Traits\SetsModelName,
        Traits\SetsCollectionName,
        Traits\SetsFileName,
        Traits\SetsClassNamespacePath,
        Traits\SetsElements,
        Traits\SetsAttributes,
        Traits\SetsParent;
    use SetsXsdNamespace,
        SetsXsdVersionNumber;

    const FILE_NAME = 'Value';

    public function runCommand()
    {
        $params = [
            '--section'              => $this->sectionName,
            '--container'            => $this->containerName,
            '--model'                => $this->modelName,
            '--file'                 => $this->fileName ?? $this->modelName ?? Self::FILE_NAME,
            '--xsd-namespace'        => $this->xsdNamespace,
            '--xsd-version-number'   => $this->xsdVersionNumber,
            '--class-namespace-path' => $this->classNamespacePath,
            '--parent'               => json_encode($this->parent, JSON_UNESCAPED_UNICODE),
            '--elements'             => json_encode($this->elements, JSON_UNESCAPED_UNICODE),
            '--attributes'           => json_encode($this->attributes),
        ];

        $this->runStatus = Artisan::call('core:xml:generate:paths:nodes:elements:mapping', $params);
        $this->runStatus = Artisan::call('core:xml:generate:paths:nodes:attributes:mapping', $params);
    }
}
