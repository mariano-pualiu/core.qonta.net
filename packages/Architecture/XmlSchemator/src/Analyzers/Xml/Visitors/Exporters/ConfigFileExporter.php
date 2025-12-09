<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Configs;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;

/**
 * This class runs the buildNodeValue at certain specific xml/xsd nodes
 * while it is traversed by the ExportingXmlNode Exporter as ValueClass
 */
class ConfigFileExporter implements ExporterVisitorContract
{
    use Traits\SetsNodeElementConfigBuilder;

    public ?XmlNodeValue $currentNode = null;

    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData
    )
    {
        $this->setElementNodeConfigBuilder(new Configs\ElementCommandBuilder());
    }

    public function export(XmlNodeValue $xmlNode)
    {
        match ($xmlNode::NODE_NAME) {
            NodesEnum::XS_ELEMENT      => $this->buildElementNodeConfigFile($xmlNode),
            default => null,
        };
    }

    /**
     * [exportElementNodeValue description]
     * @param  ElementNodeValue $elementNode [description]
     * @return [type]                        [description]
     */
    public function buildElementNodeConfigFile(ElementNodeValue $elementNode)
    {
        $elementName        = $elementNode->getNameAttributeValue()?->value;
        $attributes         = $elementNode->getComplexTypeNode()?->getAttributeNodes()?->mapIntoCommandConfig();
        $fileName           = $elementName . 'Config';
        $classNamespacePath = $elementNode->getClassNamespacePath();
        $xsdNamespace       = $elementNode->getSchemaNode()?->getTargetNamespaceAttributeValue()->value;
        $parent             = $elementNode->getParentElement();

        if($parent){
            $parent = [
                'className' => $parent->getNameAttributeValue()?->value,
                'classNamespacePath' => $parent->getClassNamespacePath(),
            ];
        }

       $subElements = $elementNode
            ->getComplexTypeNode()
            ?->getSequenceNode()
            ?->getElementNodes()
            ?->mapIntoCommandConfig()
            ?->toArray();

        $this->elementNodeConfigBuilder
            ->reset()
            ->setSectionName($this->builderDirectorData->sectionName)
            ->setContainerName($this->builderDirectorData->containerName)
            ->setModelName($elementName)
            ->setFileName($fileName)
            ->setClassNamespacePath($classNamespacePath)
            ->setXsdNamespace($xsdNamespace)
            ->setXsdVersionNumber($this->builderDirectorData->versionNumber)
            ->setParent($parent ?? [])
            ->setElements($subElements ?? [])
            ->setAttributes($attributes->toArray())
            ->runCommand();
    }
}
