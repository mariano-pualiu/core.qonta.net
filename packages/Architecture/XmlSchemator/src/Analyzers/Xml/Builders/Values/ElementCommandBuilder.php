<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Values;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdNamespace;
use Architecture\XmlSchemator\Analyzers\Xml\Builders\Traits\SetsXsdVersionNumber;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Artisan;

class ElementCommandBuilder extends CommandBuilder
{
    use Traits\SetsSectionName,
        Traits\SetsContainerName,
        Traits\SetsModelName,
        Traits\SetsCollectionName,
        Traits\SetsFileName,
        Traits\SetsAnnotation,
        Traits\SetsClassNamespacePath,
        Traits\SetsAttributes,
        Traits\SetsElements,
        Traits\SetsCustomAttributes,
        Traits\SetsCustomElements,
        Traits\SetsCustomNamespaces,
        Traits\SetsParent;
    use /*SetsXsdNamespace,*/
        SetsXsdVersionNumber;

    const FILE_NAME = 'Value';

    public function runCommand()
    {
        $params = [
            '--section'              => $this->sectionName,
            '--container'            => $this->containerName,
            '--model'                => $this->modelName,
            '--collection'           => $this->collectionName,
            '--file'                 => $this->fileName ?? $this->modelName ?? Self::FILE_NAME,
            '--xsd-version-number'   => $this->xsdVersionNumber,
            '--class-namespace-path' => $this->classNamespacePath,
            '--annotation'           => json_encode($this->annotation, JSON_UNESCAPED_UNICODE),
            '--attributes'           => json_encode($this->attributes),
            '--elements'             => json_encode($this->elements),
            '--elementAttributes'    => json_encode($this->customAttributes),
            '--elementElements'      => json_encode($this->customElements),
            '--elementNamespaces'    => json_encode($this->customNamespaces),
            '--parent'               => json_encode($this->parent, JSON_UNESCAPED_UNICODE),
            // '--xsd-namespace'     => $this->xsdNamespace,
        ];

        $this->runStatus = Artisan::call('core:xml:generate:value:node:element', $params);
    }
}
