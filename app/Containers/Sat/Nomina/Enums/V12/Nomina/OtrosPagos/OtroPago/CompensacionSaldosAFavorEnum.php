<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPago;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum CompensacionSaldosAFavorEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case SaldoAFavor                              = 'SaldoAFavor';
    case Año                                      = 'Año';
    case RemanenteSalFav                          = 'RemanenteSalFav';

    public function annotation(): string
    {
        return match($this)
        {
            CompensacionSaldosAFavorEnum::SaldoAFavor     => 'Atributo requerido para expresar el saldo a favor determinado por el patrón al trabajador en periodos o ejercicios anteriores.',
            CompensacionSaldosAFavorEnum::Año             => 'Atributo requerido para expresar el año en que se determinó el saldo a favor del trabajador por el patrón que se incluye en el campo “RemanenteSalFav”.',
            CompensacionSaldosAFavorEnum::RemanenteSalFav => 'Atributo requerido para expresar el remanente del saldo a favor del trabajador.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            CompensacionSaldosAFavorEnum::SaldoAFavor     => Types\TdCFDIEnum::T_ImporteMXN->base(),
            CompensacionSaldosAFavorEnum::Año             => BaseEnum::,
            CompensacionSaldosAFavorEnum::RemanenteSalFav => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            CompensacionSaldosAFavorEnum::SaldoAFavor     => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            CompensacionSaldosAFavorEnum::Año             => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('2016'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            CompensacionSaldosAFavorEnum::RemanenteSalFav => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
