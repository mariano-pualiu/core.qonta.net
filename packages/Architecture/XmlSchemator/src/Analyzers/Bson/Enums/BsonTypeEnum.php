<?php

namespace Architecture\XmlSchemator\Analyzers\Bson\Enums;

use ArchTech\Enums\Options;

enum BsonTypeEnum: string
{
    use Options;

    case BSON_Double                  = "double";
    case BSON_String                  = "string";
    case BSON_Object                  = "object";
    case BSON_Array                   = "array";
    case BSON_Binary_Data             = "binData";
    case BSON_Undefined               = "undefined";
    case BSON_ObjectId                = "objectId";
    case BSON_Boolean                 = "bool";
    case BSON_Date                    = "date";
    case BSON_Null                    = "null";
    case BSON_Regular_Expression      = "regex";
    case BSON_DBPointer               = "dbPointer";
    case BSON_JavaScript              = "javascript";
    case BSON_Symbol                  = "symbol";
    case BSON_JavaScriptCodeWithScope = "javascriptWithScope";
    case BSON_32Bit_Integer           = "int";
    case BSON_Timestamp               = "timestamp";
    case BSON_64Bit_Integer           = "long";
    case BSON_Decimal128              = "decimal";
    case BSON_Min_Key                 = "minKey";
    case BSON_Max_Key                 = "maxKey";

    public function number(): int
    {
        return match($this)
        {
            BsonTypeEnum::BSON_Double                  => 1,
            BsonTypeEnum::BSON_String                  => 2,
            BsonTypeEnum::BSON_Object                  => 3,
            BsonTypeEnum::BSON_Array                   => 4,
            BsonTypeEnum::BSON_Binary_Data             => 5,
            BsonTypeEnum::BSON_Undefined               => 6,
            BsonTypeEnum::BSON_ObjectId                => 7,
            BsonTypeEnum::BSON_Boolean                 => 8,
            BsonTypeEnum::BSON_Date                    => 9,
            BsonTypeEnum::BSON_Null                    => 10,
            BsonTypeEnum::BSON_Regular_Expression      => 11,
            BsonTypeEnum::BSON_DBPointer               => 12,
            BsonTypeEnum::BSON_JavaScript              => 13,
            BsonTypeEnum::BSON_Symbol                  => 14,
            BsonTypeEnum::BSON_JavaScriptCodeWithScope => 15,
            BsonTypeEnum::BSON_32Bit_Integer           => 16,
            BsonTypeEnum::BSON_Timestamp               => 17,
            BsonTypeEnum::BSON_64Bit_Integer           => 18,
            BsonTypeEnum::BSON_Decimal128              => 19,
            BsonTypeEnum::BSON_Min_Key                 => -1,
            BsonTypeEnum::BSON_Max_Key                 => 127,
        };
    }

    public function isDeprecated(): boolean
    {
        return match($this)
        {
            BsonTypeEnum::BSON_Undefined               => true,
            BsonTypeEnum::BSON_DBPointer               => true,
            BsonTypeEnum::BSON_Symbol                  => true,
            BsonTypeEnum::BSON_JavaScriptCodeWithScope => true,
            default                                    => false,
        };
    }
}
