<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\XmlNodeAttributesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Collections\XmlNodesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Traits\Attributes;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors;
// use Architecture\XmlSchemator\Parents\Values\Value;
use App\Ship\Parents\Values\Value;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Sabre\Xml;
use Sabre\Xml\Reader;

abstract class XmlNodeValue extends Value implements Visitors\Contracts\ExportableContract, Visitors\Contracts\TraversableContract, /*Xml\XmlSerializable,*/ Xml\XmlDeserializable
{
    use Attributes\GetsNameAttribute;
    use Attributes\GetsValueAttribute;
    use Visitors\Contracts\Traits\ExportingXmlNode;
    use Visitors\Contracts\Traits\TraversingXmlNode;

    public ?XmlNodeValue $parentNode = null;

    public ?string $classNamespacePath = null;

    public ?string $pathFilename = null;

    public function __construct(
        public string $namespace,
        public string $name,
        public XmlNodeAttributesCollection $attributes,
        public XmlNodesCollection|string|null $content = null,
    )
    {
    }

    public static function xmlDeserialize(Reader $reader)
    {
        preg_match('/^\{(.*)\}(.+)$/', $reader->getClark(), $matches);

        [$clark, $namespace, $name] = $matches;
        // dd($reader->parseAttributes());
        $attributes = (new XmlNodeAttributesCollection($reader->parseAttributes()))->mapIntoNodeAttributes();

        $xmlNodeValue = new static(
            namespace: $namespace,
            name: $name,
            attributes: $attributes
        );

        $children = $reader->parseInnerTree();

        $xmlNodeValue->content = is_array($children)
            ? (new XmlNodesCollection(Arr::pluck($children, 'value')))
            : $children;

        if (is_a($xmlNodeValue->content, XmlNodesCollection::class)) {
            $xmlNodeValue->content->each(fn ($childNode) => $childNode->setParent($xmlNodeValue));
        }

        return $xmlNodeValue;
    }

    public function setParent(XmlNodeValue &$parentNode)
    {
        $this->parentNode = $parentNode;

        return $this;
    }

    /**
     * none
     * \Comprobante
     * \Comprobante\Conceptos
     * \Comprobante\CfdiRelacionados
     *
     * @param  XmlNodeValue $xmlNodeValue [description]
     * @return [type]                     [description]
     */
    public function getClassNamespacePath($debug = false)
    {
        if (!is_null($this->classNamespacePath)) {
            return $this->classNamespacePath;
        }

        $parentNamespace = Str::of($this->parentNode?->getClassNamespacePath() ?? '/');

        return $this->classNamespacePath = match ($this::NODE_NAME) {
            NodesEnum::XS_ATTRIBUTE => Str::of($parentNamespace)
                ->append($this->parentNode?->getNameAttributeValue())
                ->finish('/'),
            default => $parentNamespace->finish('/')->finish($this->getNameAttributeValue()),
        };
    }

    public function getFileName()
    {
        $attributeName = $this->getNameAttributeValue() ?? '';

        return Str::of($attributeName)->start('\\')->__toString();
    }

    public function getParentElement()
    {
        $parentNode = $this->parentNode;

        while (is_a($parentNode, XmlNodeValue::class) && $parentNode::NODE_NAME != NodesEnum::XS_ELEMENT) {
            $parentNode = $parentNode->parentNode;
        }

        return $parentNode;
    }

    public function getSchemaNode()
    {
        $schemaNode = $this->parentNode;

        while (is_a($schemaNode, XmlNodeValue::class) && $schemaNode::NODE_NAME != NodesEnum::XS_SCHEMA) {
            $schemaNode = $schemaNode->parentNode;
        }

        return $schemaNode;
    }
}
