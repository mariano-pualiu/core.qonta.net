<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\ElementNodeConfigCommandBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Builders\Enums;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits\SetsNodeElementEnumBuilder;
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
class EnumClassExporter implements ExporterVisitorContract
{
    use SetsNodeElementEnumBuilder;

    public ?XmlNodeValue $currentNode = null;

    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData
    )
    {
        $this->setElementNodeEnumBuilder(new Enums\ElementCommandBuilder());
    }

    public function export(XmlNodeValue $xmlNode)
    {
        match ($xmlNode::NODE_NAME) {
            NodesEnum::XS_ELEMENT      => $this->buildElementNodeEnumClass($xmlNode),
            default => null,
        };
    }

    public function buildElementNodeEnumClass(ElementNodeValue $elementNode)
    {
        $elementName = $elementNode->getNameAttributeValue()?->value;

        $fileName = $collectionName = $modelName = $elementName . 'Enum';

        $attributes = $elementNode->getComplexTypeNode()?->getAttributeNodes()?->mapIntoCommandConfig();

        $classNamespacePath = $elementNode->getClassNamespacePath();

        $parent = $elementNode->getParentElement();

        $parent = [
            'className' => $parent?->getNameAttributeValue()?->value,
            'classNamespacePath' => $parent?->getClassNamespacePath(),
        ];

        $this->elementNodeEnumBuilder
            ->reset()
            ->setSectionName($this->builderDirectorData->sectionName)
            ->setContainerName($this->builderDirectorData->containerName)
            ->setModelName($modelName)
            ->setCollectionName($collectionName)
            ->setFileName($fileName)
            ->setParent($parent)
            ->setClassNamespacePath($classNamespacePath)
            ->setXsdVersionNumber($this->builderDirectorData->versionNumber)
            // ->setNamespace($namespace)
            // ->setNamespace(Str::of($namespace)->beforeLast('/')->start('/')->toString())
            ->setAttributes($attributes->toArray())
            ->runCommand();
    }
}
