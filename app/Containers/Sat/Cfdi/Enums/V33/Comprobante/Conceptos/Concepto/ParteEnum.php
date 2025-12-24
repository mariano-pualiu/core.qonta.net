<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum ParteEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case ClaveProdServ          = 'ClaveProdServ';
    case NoIdentificacion       = 'NoIdentificacion';
    case Cantidad               = 'Cantidad';
    case Unidad                 = 'Unidad';
    case Descripcion            = 'Descripcion';
    case ValorUnitario          = 'ValorUnitario';
    case Importe                = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            ParteEnum::ClaveProdServ    => 'Atributo requerido para expresar la clave del producto o del servicio amparado por la presente parte. Es requerido y deben utilizar las claves del catálogo de productos y servicios, cuando los conceptos que registren por sus actividades correspondan con dichos conceptos.',
            ParteEnum::NoIdentificacion => 'Atributo opcional para expresar el número de serie, número de parte del bien o identificador del producto o del servicio amparado por la presente parte. Opcionalmente se puede utilizar claves del estándar GTIN.',
            ParteEnum::Cantidad         => 'Atributo requerido para precisar la cantidad de bienes o servicios del tipo particular definido por la presente parte.',
            ParteEnum::Unidad           => 'Atributo opcional para precisar la unidad de medida propia de la operación del emisor, aplicable para la cantidad expresada en la parte. La unidad debe corresponder con la descripción de la parte. ',
            ParteEnum::Descripcion      => 'Atributo requerido para precisar la descripción del bien o servicio cubierto por la presente parte.',
            ParteEnum::ValorUnitario    => 'Atributo opcional para precisar el valor o precio unitario del bien o servicio cubierto por la presente parte. No se permiten valores negativos.',
            ParteEnum::Importe          => 'Atributo opcional para precisar el importe total de los bienes o servicios de la presente parte. Debe ser equivalente al resultado de multiplicar la cantidad por el valor unitario expresado en la parte. No se permiten valores negativos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ParteEnum::ClaveProdServ    => Types\CatCFDIEnum::C_ClaveProdServ->base(),
            ParteEnum::NoIdentificacion => BaseEnum::XS_STRING,
            ParteEnum::Cantidad         => BaseEnum::XS_DECIMAL,
            ParteEnum::Unidad           => BaseEnum::XS_STRING,
            ParteEnum::Descripcion      => BaseEnum::XS_STRING,
            ParteEnum::ValorUnitario    => Types\TdCFDIEnum::T_Importe->base(),
            ParteEnum::Importe          => Types\TdCFDIEnum::T_Importe->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ParteEnum::ClaveProdServ    => Types\CatCFDIEnum::C_ClaveProdServ->restrictionRules(),
            ParteEnum::NoIdentificacion => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            ParteEnum::Cantidad         => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ParteEnum::Unidad           => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('20'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,20}'),
            ],
            ParteEnum::Descripcion      => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('1000'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,1000}'),
            ],
            ParteEnum::ValorUnitario    => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ParteEnum::Importe          => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
