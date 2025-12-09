<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders\Models;

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
        Traits\SetsProperties,
        Traits\SetsClassNamespacePath,
        Traits\SetsMethods,
        Traits\SetsNamespaces,
        Traits\SetsImplements,
        Traits\SetsTraits,
        Traits\SetsAttributes,
        Traits\SetsElements,
        Traits\SetsParent;
    use SetsXsdNamespace, SetsXsdVersionNumber;

    const FILE_NAME = 'Model';

    public function runCommand()
    {
        // dump($this->traits);
        $params = [
            '--section'              => $this->sectionName,
            '--container'            => $this->containerName,
            '--model'                => $this->modelName,
            '--collection'           => $this->collectionName,
            '--class-namespace-path' => $this->classNamespacePath,
            '--file'                 => $this->fileName ?? $this->modelName ?? Self::FILE_NAME,
            '--xsd-namespace'        => $this->xsdNamespace,
            '--xsd-version-number'   => $this->xsdVersionNumber,
            '--parent'               => json_encode($this->parent, JSON_UNESCAPED_UNICODE),
            '--elements'             => json_encode($this->elements, JSON_UNESCAPED_UNICODE),
            '--attributes'           => json_encode($this->attributes),
            '--properties'           => json_encode($this->properties),
            '--namespaces'           => json_encode($this->namespaces),
            '--implements'           => json_encode($this->implements),
            '--traits'               => json_encode($this->traits),
            '--methods'              => json_encode($this->methods),
        ];
        // dump($params);

        $this->runStatus = Artisan::call('core:xml:generate:model:node:element', $params);
    }
}
