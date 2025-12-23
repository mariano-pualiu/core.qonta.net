<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el saldo a favor determinado por el patrón al trabajador en periodos o ejercicios anteriores."
 */
class SaldoAFavorAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'SaldoAFavor';

    const USE = UseEnum::REQUIRED;

    const TYPE = CompensacionSaldosAFavorEnum::SaldoAFavor;
}
