<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago as OtroPagoAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para expresar la información detallada del otro pago."
 */
class OtroPagoElement extends ElementData
{
    # Elements
    protected OtroPagoElements\SubsidioAlEmpleoElement $SubsidioAlEmpleo;
    protected OtroPagoElements\CompensacionSaldosAFavorElement $CompensacionSaldosAFavor;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(OtroPagoAttributes\TipoOtroPagoAttribute::class)]
        public OtroPagoAttributes\TipoOtroPagoAttribute $TipoOtroPago,

        #[WithCastable(OtroPagoAttributes\ClaveAttribute::class)]
        public OtroPagoAttributes\ClaveAttribute $Clave,

        #[WithCastable(OtroPagoAttributes\ConceptoAttribute::class)]
        public OtroPagoAttributes\ConceptoAttribute $Concepto,

        #[WithCastable(OtroPagoAttributes\ImporteAttribute::class)]
        public OtroPagoAttributes\ImporteAttribute $Importe
    )
    {}
}
