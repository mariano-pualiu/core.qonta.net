<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el año en que se determinó el saldo a favor del trabajador por el patrón que se incluye en el campo “RemanenteSalFav”."
 */
class AñoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Año';

    const USE = UseEnum::REQUIRED;

    const TYPE = CompensacionSaldosAFavorEnum::Año;
}
