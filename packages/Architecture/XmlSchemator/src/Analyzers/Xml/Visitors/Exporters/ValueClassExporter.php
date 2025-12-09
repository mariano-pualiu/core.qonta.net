<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;

use Architecture\XmlSchemator\Analyzers\Xml\Builders\Values;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits\SetsNodeAttributeValueBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Directors\Traits\SetsNodeElementValueBuilder;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\AttributeNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ElementNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\XmlNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * This class runs the buildValue at certain specific xml/xsd nodes
 * while it is traversed by the ExportingXmlNode Exporter as ValueClass
 */
class ValueClassExporter implements ExporterVisitorContract
{
    use SetsNodeElementValueBuilder, SetsNodeAttributeValueBuilder;

    public function __construct(
        public ApiBuilderDirectorData $builderDirectorData,
    )
    {
        $this->setElementNodeValueBuilder(new Values\ElementCommandBuilder());

        $this->setAttributeNodeValueBuilder(new Values\AttributeCommandBuilder());
    }

    public function export(XmlNodeValue $xmlNode)
    {
        match ($xmlNode::NODE_NAME) {
            NodesEnum::XS_ATTRIBUTE    => $this->buildAttributeNodeValueClass($xmlNode),
            NodesEnum::XS_ELEMENT      => $this->buildElementNodeValueClass($xmlNode),
            default => null,
        };
    }

    /**
     * [exportElementNodeValue description]
     * @param  ElementNodeValue $elementNode [description]
     * @return [type]                        [description]
     */
    public function buildElementNodeValueClass(ElementNodeValue $elementNode)
    {
        $elementName = $elementNode->getNameAttributeValue()?->value;

        $attributes = $elementNode->getComplexTypeNode()?->getAttributeNodes()?->mapIntoCommandConfig();

        $fileName = $collectionName = $modelName = $elementName . 'Element';

        $classNamespacePath = $elementNode->getClassNamespacePath();

        $annotation = $elementNode->getAnnotationNode()?->getDocumentationNode()?->content;

        $parent = $elementNode->getParentElement();

        $parent = [
            'className' => $parent?->getNameAttributeValue()?->value,
            'classNamespacePath' => $parent?->getClassNamespacePath(),
        ];

        // $properties = $elementNode->attributes->asKeyValue();

        // $elements = $elementNode->getComplexTypeNode()?->asValueElements();
        // $elements = $elementNode->getComplexTypeNode()?->asValueElementsClass($this->builderDirectorData);
        $elements = $elementNode->getComplexTypeNode()?->getSequenceNode()?->getElementNodes()?->mapIntoCommandConfig();

        $elementConfigPath = collect(Str::of($classNamespacePath)->after('/')->explode('/'))
            ->map(fn ($segment) => Str::snake($segment))
            ->implode('.');
        $modelConfig = Arr::get($this->builderDirectorData->containerConfig, $elementConfigPath);
        // dd($modelConfig);
        $customAttributes = Arr::get($modelConfig, 'element.attributes', []);

        $customNamespaces = Arr::get($modelConfig, 'element.namespaces', []);

        return $this->elementNodeValueBuilder
            ->reset()
            ->setSectionName($this->builderDirectorData->sectionName)
            ->setContainerName($this->builderDirectorData->containerName)
            ->setModelName($modelName)
            ->setCollectionName($collectionName)
            ->setFileName($fileName)
            ->setClassNamespacePath($classNamespacePath)
            ->setParent($parent)
            ->setXsdVersionNumber($this->builderDirectorData->versionNumber)
            // ->setNamespace($namespace)
            ->setAnnotation($annotation)
            // ->setProperties($properties->toArray())
            ->setCustomAttributes($customAttributes)
            ->setCustomNamespaces($customNamespaces)
            ->setAttributes($attributes->toArray())
            ->setElements($elements?->toArray() ?? [])
            ->runCommand();
    }

    /**
     * This method should trigger the creation of a Class
     * which extends the Ship\Parents\Value\AttributeValue Class
     * with the class Name of the "name" attribute "value"
     * that defines the property type of an ElementValue Class property.
     *
     * It will be in charge of defining the following parameters for the Attribute class
     *     - Attribute Name (required)
     *     - Attribute Use (required)
     *     - Attribute Fixed (optional)
     *     - Attribute Type (optional)
     *     - Attribute Description (optional)
     *
     * @param  AttributeNodeValue $attributeNode [description]
     * @return [type]                            [description]
     */
    public function buildAttributeNodeValueClass(AttributeNodeValue $attributeNode)
    {
        $collectionName = $modelName = $attributeName = $attributeNode->getNameAttributeValue()?->value;

        $parentNode = $attributeNode->parentNode->parentNode;

        // $parent = $elementNode->getParentElement();

        $parentNode = [
            'className' => $parentNode?->getNameAttributeValue()?->value,
            'classNamespacePath' => $parentNode?->getClassNamespacePath(),
        ];

        // $parentName = $parentNode->getNameAttributeValue()?->value;
        // $parentNamespace = $parentNode->getClassNamespacePath();

        $fileName = $attributeName . 'Attribute';

        $classNamespacePath = $attributeNode->getClassNamespacePath();

        $annotation = $attributeNode->getAnnotationNode()?->getDocumentationNode()?->content;

        $properties = $attributeNode->attributes->asKeyValue();

        // $restrictions = $attributeNode->getSimpleTypeNode()?->asValueAttributes();
        // $restrictions = $attributeNode->getSimpleTypeNode()?->asValueAttributesClass($this->builderDirectorData);
        // $restrictions = $attributeNode->getSimpleTypeNode()?->getRestrictionNode()?->value?->mapWithKeys(fn ($ruleNode) => [$ruleNode->name => $ruleNode->getValueAttributeValue()->value]);

        return $this->attributeNodeValueBuilder
            ->reset()
            ->setSectionName($this->builderDirectorData->sectionName)
            ->setContainerName($this->builderDirectorData->containerName)
            ->setModelName($modelName)
            ->setCollectionName($collectionName)
            ->setFileName($fileName)
            ->setParent($parentNode)
            ->setClassNamespacePath($classNamespacePath)
            ->setXsdVersionNumber($this->builderDirectorData->versionNumber)
            // ->setNamespace($namespace)
            ->setAnnotation($annotation)
            ->setProperties($properties->toArray())
            // ->setRestrictions($restrictions?->toArray() ?? [])
            ->runCommand();
    }
}
