<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavor as CompensacionSaldosAFavorAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar la información referente a la compensación de saldos a favor de un trabajador."
 */
class CompensacionSaldosAFavorElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(CompensacionSaldosAFavorAttributes\SaldoAFavorAttribute::class)]
        public CompensacionSaldosAFavorAttributes\SaldoAFavorAttribute $SaldoAFavor,

        #[WithCastable(CompensacionSaldosAFavorAttributes\AñoAttribute::class)]
        public CompensacionSaldosAFavorAttributes\AñoAttribute $Año,

        #[WithCastable(CompensacionSaldosAFavorAttributes\RemanenteSalFavAttribute::class)]
        public CompensacionSaldosAFavorAttributes\RemanenteSalFavAttribute $RemanenteSalFav
    )
    {}
}
