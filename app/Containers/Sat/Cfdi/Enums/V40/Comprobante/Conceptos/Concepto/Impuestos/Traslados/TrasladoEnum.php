<?php

namespace App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\Impuestos\Traslados;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum TrasladoEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Base                = 'Base';
    case Impuesto            = 'Impuesto';
    case TipoFactor          = 'TipoFactor';
    case TasaOCuota          = 'TasaOCuota';
    case Importe             = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            TrasladoEnum::Base       => 'Atributo requerido para señalar la base para el cálculo del impuesto, la determinación de la base se realiza de acuerdo con las disposiciones fiscales vigentes. No se permiten valores negativos.',
            TrasladoEnum::Impuesto   => 'Atributo requerido para señalar la clave del tipo de impuesto trasladado aplicable al concepto.',
            TrasladoEnum::TipoFactor => 'Atributo requerido para señalar la clave del tipo de factor que se aplica a la base del impuesto.',
            TrasladoEnum::TasaOCuota => 'Atributo condicional para señalar el valor de la tasa o cuota del impuesto que se traslada para el presente concepto. Es requerido cuando el atributo TipoFactor tenga una clave que corresponda a Tasa o Cuota.',
            TrasladoEnum::Importe    => 'Atributo condicional para señalar el importe del impuesto trasladado que aplica al concepto. No se permiten valores negativos. Es requerido cuando TipoFactor sea Tasa o Cuota.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            TrasladoEnum::Base       => BaseEnum::XS_DECIMAL,
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
            TrasladoEnum::Base       => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            TrasladoEnum::Impuesto   => Types\CatCFDIEnum::C_Impuesto->restrictionRules(),
            TrasladoEnum::TipoFactor => Types\CatCFDIEnum::C_TipoFactor->restrictionRules(),
            TrasladoEnum::TasaOCuota => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000000'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            TrasladoEnum::Importe    => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
