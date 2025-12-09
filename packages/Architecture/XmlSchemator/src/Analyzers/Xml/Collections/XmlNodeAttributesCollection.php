<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Collections;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Names;
use Architecture\XmlSchemator\Analyzers\Xml\Values;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\Attributes;
use Illuminate\Database\Eloquent\Collection;

class XmlNodeAttributesCollection extends Collection
{
    public function mapIntoNodeAttributes()
    {
        return $this->transform(function ($attributeValue, $attributeName) {
            return match ($attributeName) {
                Names\XmlEnum::VERSION->value                   => new Attributes\VersionAttributeValue($attributeValue, $attributeName),
                Names\XmlEnum::ENCODING->value                  => new Attributes\EncodingAttributeValue($attributeValue, $attributeName),

                Names\SchemaEnum::XMLNS_XS->value               => new Attributes\XmlnsXsAttributeValue($attributeValue, $attributeName),
                Names\SchemaEnum::XMLNS_CFDI->value             => new Attributes\XmlnsCfdiAttributeValue($attributeValue, $attributeName),
                Names\SchemaEnum::XMLNS_CAT_CFDI->value         => new Attributes\XmlnsCatCFDIAttributeValue($attributeValue, $attributeName),
                Names\SchemaEnum::XMLNS_TD_CFDI->value          => new Attributes\XmlnsTdCFDIAttributeValue($attributeValue, $attributeName),
                Names\SchemaEnum::TARGET_NAMESPACE->value       => new Attributes\TargetNamespaceAttributeValue($attributeValue, $attributeName),
                Names\SchemaEnum::ELEMENT_FORM_DEFAULT->value   => new Attributes\ElementFormDefaultAttributeValue($attributeValue, $attributeName),
                Names\SchemaEnum::ATTRIBUTE_FORM_DEFAULT->value => new Attributes\AttributeFormDefaultAttributeValue($attributeValue, $attributeName),

                Names\ImportEnum::NAMESPACE->value              => new Attributes\NamespaceAttributeValue($attributeValue, $attributeName),
                Names\ImportEnum::SCHEMA_LOCATION->value        => new Attributes\SchemaLocationAttributeValue($attributeValue, $attributeName),

                Names\NodeEnum::NAME->value                     => new Attributes\NameAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::USE->value                      => new Attributes\UseAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::TYPE->value                     => new Attributes\TypeAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::MAX_OCCURS->value               => new Attributes\MaxOccursAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::MIN_OCCURS->value               => new Attributes\MinOccursAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::BASE->value                     => new Attributes\BaseAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::VALUE->value                    => new Attributes\ValueAttributeValue($attributeValue, $attributeName),
                Names\NodeEnum::FIXED->value                    => new Attributes\FixedAttributeValue($attributeValue, $attributeName),
                default                                         => new Values\XmlAttributeValue($attributeValue, $attributeName),
            };
        });
    }

    public function asKeyValue()
    {
        return $this->map(function ($element) {
            return (string) $element;
        });
    }

    public function exceptName()
    {
        return $this->reject(function ($attribute) {
            return $attribute instanceof Attributes\NameAttributeValue;
        });
    }
}
