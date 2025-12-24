<?php

namespace App\Containers\Sat\Nomina\Enums\V12;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum NominaEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Version                  = 'Version';
    case TipoNomina               = 'TipoNomina';
    case FechaPago                = 'FechaPago';
    case FechaInicialPago         = 'FechaInicialPago';
    case FechaFinalPago           = 'FechaFinalPago';
    case NumDiasPagados           = 'NumDiasPagados';
    case TotalPercepciones        = 'TotalPercepciones';
    case TotalDeducciones         = 'TotalDeducciones';
    case TotalOtrosPagos          = 'TotalOtrosPagos';

    public function annotation(): string
    {
        return match($this)
        {
            NominaEnum::Version           => 'Atributo requerido para la expresión de la versión del complemento.',
            NominaEnum::TipoNomina        => 'Atributo requerido para indicar el tipo de nómina, puede ser O= Nómina ordinaria o E= Nómina extraordinaria.',
            NominaEnum::FechaPago         => 'Atributo requerido para la expresión de la fecha efectiva de erogación del gasto. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601.',
            NominaEnum::FechaInicialPago  => 'Atributo requerido para la expresión de la fecha inicial del período de pago. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601.',
            NominaEnum::FechaFinalPago    => 'Atributo requerido para la expresión de la fecha final del período de pago. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601.',
            NominaEnum::NumDiasPagados    => 'Atributo requerido para la expresión del número o la fracción de días pagados.',
            NominaEnum::TotalPercepciones => 'Atributo condicional para representar la suma de las percepciones.',
            NominaEnum::TotalDeducciones  => 'Atributo condicional para representar la suma de las deducciones aplicables.',
            NominaEnum::TotalOtrosPagos   => 'Atributo condicional para representar la suma de otros pagos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            NominaEnum::Version           => BaseEnum::XS_STRING,
            NominaEnum::TipoNomina        => Types\CatNominaEnum::C_TipoNomina->base(),
            NominaEnum::FechaPago         => Types\TdCFDIEnum::T_Fecha->base(),
            NominaEnum::FechaInicialPago  => Types\TdCFDIEnum::T_Fecha->base(),
            NominaEnum::FechaFinalPago    => Types\TdCFDIEnum::T_Fecha->base(),
            NominaEnum::NumDiasPagados    => BaseEnum::XS_DECIMAL,
            NominaEnum::TotalPercepciones => Types\TdCFDIEnum::T_ImporteMXN->base(),
            NominaEnum::TotalDeducciones  => Types\TdCFDIEnum::T_ImporteMXN->base(),
            NominaEnum::TotalOtrosPagos   => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            NominaEnum::Version           => [
                
            ],
            NominaEnum::TipoNomina        => Types\CatNominaEnum::C_TipoNomina->restrictionRules(),
            NominaEnum::FechaPago         => Types\TdCFDIEnum::T_Fecha->restrictionRules(),
            NominaEnum::FechaInicialPago  => Types\TdCFDIEnum::T_Fecha->restrictionRules(),
            NominaEnum::FechaFinalPago    => Types\TdCFDIEnum::T_Fecha->restrictionRules(),
            NominaEnum::NumDiasPagados    => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.001'),
                CommonRules\MaxInclusiveRule::class => new CommonRules\MaxInclusiveRule('36160.000'),
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('3'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('(([1-9][0-9]{0,4})|[0])(.[0-9]{3})?'),
            ],
            NominaEnum::TotalPercepciones => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            NominaEnum::TotalDeducciones  => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            NominaEnum::TotalOtrosPagos   => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
