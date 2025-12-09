<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\RestrictionsNodeEnumCommandBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits\SetsNodeRestrictionsEnumBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;

/**
 * This class runs the buildNodeValue at certain specific xml/xsd nodes
 * while it is traversed by the ExportingXmlNode Exporter as ValueClass
 */
class NodeRestrictionEnumsExporter implements ExporterVisitorContract
{
    use SetsNodeRestrictionsEnumBuilder;

    public ApiBuilderDirectorData $builderDirectorData;

    public ?XmlNodeValue $currentNode = null;

    public function __construct(ApiBuilderDirectorData $builderDirectorData)
    {
        $this->builderDirectorData = $builderDirectorData;

        $this->setRestrictionsNodeEnumBuilder(new RestrictionsNodeEnumCommandBuilder());
    }

    /**
     * [exportElementNodeValue description]
     * @param  ElementNodeValue $elementNode [description]
     * @return [type]                        [description]
     */
    public function exportElementNode(ElementNodeValue $elementNode)
    {
        $elementName = $elementNode->getNameAttributeValue()?->value;

        $fileName = $collectionName = $modelName = $elementName . 'Enum';

        $namespace = $elementNode->getClassNamespacePath();

        $attributes = $elementNode->getComplexTypeNode()?->asValueAttributes();

        return $this->restrictionsNodeEnumBuilder
            ->reset()
            ->setSectionName($this->builderDirectorData->sectionName)
            ->setContainerName($this->builderDirectorData->containerName)
            ->setModelName($modelName)
            ->setCollectionName($collectionName)
            ->setFileName($fileName)
            ->setNamespace($namespace)
            ->setAttributes($attributes->toArray())
            ->runCommand();
    }
}
