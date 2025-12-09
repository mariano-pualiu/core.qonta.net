<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\ElementNodeConfigCommandBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Builders\Models;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits\SetsNodeElementModelBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * This class runs the buildNodeValue at certain specific xml/xsd nodes
 * while it is traversed by the ExportingXmlNode Exporter as ValueClass
 */
class ModelClassExporter implements ExporterVisitorContract
{
    use SetsNodeElementModelBuilder;

    public ?XmlNodeValue $currentNode = null;

    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData
    )
    {
        $this->setElementNodeModelBuilder(new Models\ElementCommandBuilder());
    }

    public function export(XmlNodeValue $xmlNode)
    {
        match ($xmlNode::NODE_NAME) {
            NodesEnum::XS_ELEMENT      => $this->buildElementNodeModelClass($xmlNode),
            default => null,
        };
    }

    public function buildElementNodeModelClass(ElementNodeValue $elementNode)
    {
        $elementName = $elementNode->getNameAttributeValue()?->value;
        // dump($elementName);
        $attributes = $elementNode->getComplexTypeNode()?->getAttributeNodes()?->mapIntoCommandConfig();

        $elements = $elementNode->getComplexTypeNode()?->getSequenceNode()?->getElementNodes()?->mapIntoCommandConfig();

        $parent = $elementNode->getParentElement();

        $parent = [
            'className'          => $parent?->getNameAttributeValue()?->value,
            'classNamespacePath' => $parent?->getClassNamespacePath(),
        ];

        // $classNamespacePath = Str::of($classNamespacePath)->beforeLast('/')->start('/')->toString();
        $classNamespacePath = $elementNode->getClassNamespacePath();

        $elementConfigPath = collect(Str::of($classNamespacePath)->after('/')->explode('/'))
            ->map(fn ($segment) => Str::snake($segment))
            ->implode('.');

        $modelConfig = Arr::get($this->builderDirectorData->containerConfig, $elementConfigPath);

        $collectionName = Arr::get($modelConfig, 'collection_name');

        $properties = Arr::get($modelConfig, 'properties', []);

        $methods = Arr::get($modelConfig, 'methods', []);

        $namespaces = Arr::get($modelConfig, 'namespaces', []);

        $implements = Arr::get($modelConfig, 'implements', []);

        $traits = Arr::get($modelConfig, 'traits', []);
        // dump($traits);

        $xsdNamespace = $elementNode->getSchemaNode()?->getTargetNamespaceAttributeValue()->value;

        return $this->elementNodeModelBuilder
            ->reset()
            ->setSectionName($this->builderDirectorData->sectionName)
            ->setContainerName($this->builderDirectorData->containerName)
            ->setModelName($elementName)->setFileName($elementName)
            ->setAttributes($attributes->toArray())
            ->setElements($elements?->toArray() ?? [])
            ->setParent($parent)
            ->setClassNamespacePath($classNamespacePath)
            ->setCollectionName($collectionName ?? $elementName)
            ->setProperties($properties)
            ->setMethods($methods)
            ->setNamespaces($namespaces)
            ->setImplements($implements)
            ->setTraits($traits)
            ->setXsdNamespace($xsdNamespace)
            ->setXsdVersionNumber($this->builderDirectorData->versionNumber)
            ->runCommand();
    }
}
