<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Impuestos\Traslados;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum TrasladoEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Impuesto            = 'Impuesto';
    case TipoFactor          = 'TipoFactor';
    case TasaOCuota          = 'TasaOCuota';
    case Importe             = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            TrasladoEnum::Impuesto   => 'Atributo requerido para señalar la clave del tipo de impuesto trasladado.',
            TrasladoEnum::TipoFactor => 'Atributo requerido para señalar la clave del tipo de factor que se aplica a la base del impuesto.',
            TrasladoEnum::TasaOCuota => 'Atributo requerido para señalar el valor de la tasa o cuota del impuesto que se traslada por los conceptos amparados en el comprobante.',
            TrasladoEnum::Importe    => 'Atributo requerido para señalar la suma del importe del impuesto trasladado, agrupado por impuesto, TipoFactor y TasaOCuota. No se permiten valores negativos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            TrasladoEnum::Impuesto   => Types\CatCFDIEnum::C_Impuesto->base(),
            TrasladoEnum::TipoFactor => Types\CatCFDIEnum::C_TipoFactor->base(),
            TrasladoEnum::TasaOCuota => BaseEnum::XS_DECIMAL,
            TrasladoEnum::Importe    => Types\TdCFDIEnum::T_Importe->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            TrasladoEnum::Impuesto   => Types\CatCFDIEnum::C_Impuesto->restrictionRules(),
            TrasladoEnum::TipoFactor => Types\CatCFDIEnum::C_TipoFactor->restrictionRules(),
            TrasladoEnum::TasaOCuota => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000000'),
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
            ],
            TrasladoEnum::Importe    => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
