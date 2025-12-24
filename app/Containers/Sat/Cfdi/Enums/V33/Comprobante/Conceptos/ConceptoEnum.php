<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum ConceptoEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case ClaveProdServ             = 'ClaveProdServ';
    case NoIdentificacion          = 'NoIdentificacion';
    case Cantidad                  = 'Cantidad';
    case ClaveUnidad               = 'ClaveUnidad';
    case Unidad                    = 'Unidad';
    case Descripcion               = 'Descripcion';
    case ValorUnitario             = 'ValorUnitario';
    case Importe                   = 'Importe';
    case Descuento                 = 'Descuento';

    public function annotation(): string
    {
        return match($this)
        {
            ConceptoEnum::ClaveProdServ    => 'Atributo requerido para expresar la clave del producto o del servicio amparado por el presente concepto. Es requerido y deben utilizar las claves del catálogo de productos y servicios, cuando los conceptos que registren por sus actividades correspondan con dichos conceptos.',
            ConceptoEnum::NoIdentificacion => 'Atributo opcional para expresar el número de parte, identificador del producto o del servicio, la clave de producto o servicio, SKU o equivalente, propia de la operación del emisor, amparado por el presente concepto. Opcionalmente se puede utilizar claves del estándar GTIN.',
            ConceptoEnum::Cantidad         => 'Atributo requerido para precisar la cantidad de bienes o servicios del tipo particular definido por el presente concepto.',
            ConceptoEnum::ClaveUnidad      => 'Atributo requerido para precisar la clave de unidad de medida estandarizada aplicable para la cantidad expresada en el concepto. La unidad debe corresponder con la descripción del concepto.',
            ConceptoEnum::Unidad           => 'Atributo opcional para precisar la unidad de medida propia de la operación del emisor, aplicable para la cantidad expresada en el concepto. La unidad debe corresponder con la descripción del concepto.',
            ConceptoEnum::Descripcion      => 'Atributo requerido para precisar la descripción del bien o servicio cubierto por el presente concepto.',
            ConceptoEnum::ValorUnitario    => 'Atributo requerido para precisar el valor o precio unitario del bien o servicio cubierto por el presente concepto.',
            ConceptoEnum::Importe          => 'Atributo requerido para precisar el importe total de los bienes o servicios del presente concepto. Debe ser equivalente al resultado de multiplicar la cantidad por el valor unitario expresado en el concepto. No se permiten valores negativos. ',
            ConceptoEnum::Descuento        => 'Atributo opcional para representar el importe de los descuentos aplicables al concepto. No se permiten valores negativos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ConceptoEnum::ClaveProdServ    => Types\CatCFDIEnum::C_ClaveProdServ->base(),
            ConceptoEnum::NoIdentificacion => BaseEnum::XS_STRING,
            ConceptoEnum::Cantidad         => BaseEnum::XS_DECIMAL,
            ConceptoEnum::ClaveUnidad      => Types\CatCFDIEnum::C_ClaveUnidad->base(),
            ConceptoEnum::Unidad           => BaseEnum::XS_STRING,
            ConceptoEnum::Descripcion      => BaseEnum::XS_STRING,
            ConceptoEnum::ValorUnitario    => Types\TdCFDIEnum::T_Importe->base(),
            ConceptoEnum::Importe          => Types\TdCFDIEnum::T_Importe->base(),
            ConceptoEnum::Descuento        => Types\TdCFDIEnum::T_Importe->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ConceptoEnum::ClaveProdServ    => Types\CatCFDIEnum::C_ClaveProdServ->restrictionRules(),
            ConceptoEnum::NoIdentificacion => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            ConceptoEnum::Cantidad         => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ConceptoEnum::ClaveUnidad      => Types\CatCFDIEnum::C_ClaveUnidad->restrictionRules(),
            ConceptoEnum::Unidad           => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('20'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,20}'),
            ],
            ConceptoEnum::Descripcion      => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('1000'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,1000}'),
            ],
            ConceptoEnum::ValorUnitario    => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ConceptoEnum::Importe          => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ConceptoEnum::Descuento        => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
