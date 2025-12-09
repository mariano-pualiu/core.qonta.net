<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Builders;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\RestrictionsEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema;
use Architecture\XmlSchemator\Analyzers\Xml\Values\SchemaNodeValue;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\CommandBuilder;
use Illuminate\Support\Facades\Storage;
use Sabre\Xml\Reader;
use Sabre\Xml\Service;

class XsdStructureCommandBuilder extends CommandBuilder
{
    use Traits\SetsBuilderDirectorData, Traits\SetsFilePath;

    // const FILE_NAME = 'Xsd';

    public $xsdStructure = null;

    public ?Service $service = null;

    public function prepareXsdService()
    {
        $this->service = new Service();

        $this->service->namespaceMap['http://www.w3.org/2001/XMLSchema'] = 'xs';

        $this->service->elementMap = collect([
            NodesEnum::XS_SCHEMA->nodeName()                 => Values\SchemaNodeValue::class,
            NodesEnum::XS_IMPORT->nodeName()                 => Schema\ImportNodeValue::class,
            NodesEnum::XS_ELEMENT->nodeName()                => Schema\ElementNodeValue::class,
            NodesEnum::XS_ANNOTATION->nodeName()             => Schema\AnnotationNodeValue::class,
            NodesEnum::XS_DOCUMENTATION->nodeName()          => Schema\Annotation\DocumentationNodeValue::class,
            NodesEnum::XS_COMPLEX_TYPE->nodeName()           => Schema\Element\ComplexTypeNodeValue::class,
            NodesEnum::XS_SEQUENCE->nodeName()               => Schema\ComplexType\SequenceNodeValue::class,
            NodesEnum::XS_ATTRIBUTE->nodeName()              => Schema\ComplexType\AttributeNodeValue::class,
            NodesEnum::XS_SIMPLE_TYPE->nodeName()            => Schema\ComplexType\Attribute\SimpleTypeNodeValue::class,
            NodesEnum::XS_RESTRICTION->nodeName()            => Schema\ComplexType\Attribute\SimpleType\RestrictionNodeValue::class,

            RestrictionsEnum::XS_LENGTH->nodeName()          => Restriction\LengthNodeValue::class,
            RestrictionsEnum::XS_WHITE_SPACE->nodeName()     => Restriction\WhiteSpaceNodeValue::class,
            RestrictionsEnum::XS_PATTERN->nodeName()         => Restriction\PatternNodeValue::class,
            RestrictionsEnum::XS_MIN_LENGTH->nodeName()      => Restriction\MinLengthNodeValue::class,
            RestrictionsEnum::XS_MAX_LENGTH->nodeName()      => Restriction\MaxLengthNodeValue::class,
            RestrictionsEnum::XS_FRACTION_DIGITS->nodeName() => Restriction\FractionDigitsNodeValue::class,
            RestrictionsEnum::XS_MIN_INCLUSIVE->nodeName()   => Restriction\MinInclusiveNodeValue::class,
            RestrictionsEnum::XS_MAX_INCLUSIVE->nodeName()   => Restriction\MaxInclusiveNodeValue::class,
            RestrictionsEnum::XS_ENUMERATION->nodeName()     => Restriction\EnumerationNodeValue::class,

            NodesEnum::XS_ANY->nodeName()                    => Schema\ComplexType\Sequence\AnyNodeValue::class,
        ])
            ->mapWithKeys(fn ($deserializer, $elementName) => ['{http://www.w3.org/2001/XMLSchema}' . $elementName => $deserializer])
            ->toArray();

            return $this;
    }

    public function runCommand()
    {
        // dump($this->filePath);
        // dump(Storage::disk('architecure-xml_schemator-assets')->path('/'));
        $xsd = Storage::disk('architecure-xml_schemator-assets')->get($this->filePath);
        // dd($xsd);

        if(!$this->service) {
            $this->prepareXsdService();
        }
        return $this->xsdStructure = $this->service->parse($xsd);
    }
}
