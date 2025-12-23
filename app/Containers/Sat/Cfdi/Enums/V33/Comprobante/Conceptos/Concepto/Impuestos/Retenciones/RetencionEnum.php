<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\Impuestos\Retenciones;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum RetencionEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Base                 = 'Base';
    case Impuesto             = 'Impuesto';
    case TipoFactor           = 'TipoFactor';
    case TasaOCuota           = 'TasaOCuota';
    case Importe              = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            RetencionEnum::Base       => 'Atributo requerido para señalar la base para el cálculo de la retención, la determinación de la base se realiza de acuerdo con las disposiciones fiscales vigentes. No se permiten valores negativos.',
            RetencionEnum::Impuesto   => 'Atributo requerido para señalar la clave del tipo de impuesto retenido aplicable al concepto.',
            RetencionEnum::TipoFactor => 'Atributo requerido para señalar la clave del tipo de factor que se aplica a la base del impuesto.',
            RetencionEnum::TasaOCuota => 'Atributo requerido para señalar la tasa o cuota del impuesto que se retiene para el presente concepto.',
            RetencionEnum::Importe    => 'Atributo requerido para señalar el importe del impuesto retenido que aplica al concepto. No se permiten valores negativos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            RetencionEnum::Base       => BaseEnum::XS_DECIMAL,
            RetencionEnum::Impuesto   => Types\CatCFDIEnum::C_Impuesto->base(),
            RetencionEnum::TipoFactor => Types\CatCFDIEnum::C_TipoFactor->base(),
            RetencionEnum::TasaOCuota => BaseEnum::XS_DECIMAL,
            RetencionEnum::Importe    => Types\TdCFDIEnum::T_Importe->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            RetencionEnum::Base       => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            RetencionEnum::Impuesto   => Types\CatCFDIEnum::C_Impuesto->restrictionRules(),
            RetencionEnum::TipoFactor => Types\CatCFDIEnum::C_TipoFactor->restrictionRules(),
            RetencionEnum::TasaOCuota => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000000'),
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
            ],
            RetencionEnum::Importe    => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
