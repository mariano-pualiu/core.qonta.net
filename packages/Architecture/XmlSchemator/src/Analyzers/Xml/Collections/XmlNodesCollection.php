<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Collections;

use Illuminate\Database\Eloquent\Collection;

class XmlNodesCollection extends Collection
{
    // public function mapIntoXmlNodes(Values\XmlNodeValue $parentNode = null)
    // {
    //     return $this->transform(function ($node) use ($parentNode) {
    //         preg_match('/^\{(.+)\}(.+)$/', $node['name'], $matches);


    //         return match ($noteType) {
    //             NodesEnum::XS_SCHEMA                 => new Values\SchemaNodeValue($node, $parentNode),
    //             NodesEnum::XS_IMPORT                 => new Schema\ImportNodeValue($node, $parentNode),
    //             NodesEnum::XS_ELEMENT                => new Schema\ElementNodeValue($node, $parentNode),
    //             NodesEnum::XS_ANNOTATION             => new Schema\AnnotationNodeValue($node, $parentNode),
    //             NodesEnum::XS_DOCUMENTATION          => new Schema\Annotation\DocumentationNodeValue($node, $parentNode),
    //             NodesEnum::XS_COMPLEX_TYPE           => new Schema\Element\ComplexTypeNodeValue($node, $parentNode),
    //             NodesEnum::XS_SEQUENCE               => new Schema\ComplexType\SequenceNodeValue($node, $parentNode),
    //             NodesEnum::XS_ATTRIBUTE              => new Schema\ComplexType\AttributeNodeValue($node, $parentNode),
    //             NodesEnum::XS_SIMPLE_TYPE            => new Schema\ComplexType\Attribute\SimpleTypeNodeValue($node, $parentNode),
    //             NodesEnum::XS_RESTRICTION            => new Schema\ComplexType\Attribute\SimpleType\RestrictionNodeValue($node, $parentNode),

    //             RestrictionsEnum::XS_LENGTH          => new Restriction\LengthNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_WHITE_SPACE     => new Restriction\WhiteSpaceNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_PATTERN         => new Restriction\PatternNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_MIN_LENGTH      => new Restriction\MinLengthNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_MAX_LENGTH      => new Restriction\MaxLengthNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_FRACTION_DIGITS => new Restriction\FractionDigitsNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_MIN_INCLUSIVE   => new Restriction\MinInclusiveNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_MAX_INCLUSIVE   => new Restriction\MaxInclusiveNodeValue($node, $parentNode),
    //             RestrictionsEnum::XS_ENUMERATION     => new Restriction\EnumerationNodeValue($node, $parentNode),

    //             NodesEnum::XS_ANY                    => new Schema\ComplexType\Sequence\AnyNodeValue($node, $parentNode),
    //             default => new Values\XmlNodeValue($node, $parentNode),
    //         };
    //     });
    // }
}
