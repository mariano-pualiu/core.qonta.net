<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Mappings;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits;
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
class MappingFileExporter implements ExporterVisitorContract
{
    use Traits\SetsNodeElementMappingBuilder;

    public ?XmlNodeValue $currentNode = null;

    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData
    )
    {
        $this->setElementNodeMappingBuilder(new Mappings\ElementCommandBuilder());
    }

    public function export(XmlNodeValue $xmlNode)
    {
        match ($xmlNode::NODE_NAME) {
            NodesEnum::XS_ELEMENT      => $this->buildElementNodeMappingFile($xmlNode),
            default => null,
        };
    }

    /**
     * [exportElementNodeValue description]
     * @param  ElementNodeValue $elementNode [description]
     * @return [type]                        [description]
     */
    public function buildElementNodeMappingFile(ElementNodeValue $elementNode)
    {
        $elementName            = $elementNode->getNameAttributeValue()?->value;
        $attributes             = $elementNode->getComplexTypeNode()?->getAttributeNodes()?->mapIntoCommandConfig();
        $fileName               = $elementName . 'Config';
        $classNamespacePath     = $elementNode->getClassNamespacePath();
        $xsdNamespace           = $elementNode->getSchemaNode()?->getTargetNamespaceAttributeValue()->value;
        $parent                 = $elementNode->getParentElement();

        if($parent){
            $parentClassNamespacePath = $parent->getClassNamespacePath();
            $parentElementConfigPath = collect(Str::of($parentClassNamespacePath)->after('/')->explode('/'))
                ->map(fn ($segment) => Str::snake($segment))
                ->implode('.');

            $modelConfig = Arr::get($this->builderDirectorData->containerConfig, $parentElementConfigPath);

            $parent = [
                'className'          => $parent->getNameAttributeValue()?->value,
                'classNamespacePath' => $parentClassNamespacePath,
                'methods'            => Arr::get($modelConfig, 'methods', []),
            ];
        }

       $subElements = $elementNode
            ->getComplexTypeNode()
            ?->getSequenceNode()
            ?->getElementNodes()
            ?->mapIntoCommandConfig()
            ?->toArray();

        $this->elementNodeMappingBuilder
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
