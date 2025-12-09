<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values;

use ArchTech\Enums\Options;

enum BaseEnum: string
{
    use Options;

    case XS_STRING    = 'xs:string';
    case XS_DECIMAL   = 'xs:decimal';
    case XS_DATE      = 'xs:date';
    case XS_INT       = 'xs:int';
    case XS_INTEGER   = 'xs:integer';
    case XS_DATE_TIME = 'xs:dateTime';
    case XS_NMTOKEN   = 'xs:NMTOKEN';
    case XSD_BOOLEAN  = 'xsd:boolean';
    case XSD_DATE     = 'xsd:date';

    public function bsonType()
    {
        return match($this)
        {
            BaseEnum::XS_STRING    => BsonTypeEnum::BSON_String->value(),
            BaseEnum::XS_DECIMAL   => BsonTypeEnum::BSON_Decimal128->value(),
            BaseEnum::XS_DATE      => BsonTypeEnum::BSON_Date->value(),
            BaseEnum::XS_INTEGER   => BsonTypeEnum::BSON_32Bit_Integer->value(),
            BaseEnum::XS_DATE_TIME => BsonTypeEnum::BSON_Date->value(),
            default                => null
        };
    }
}
