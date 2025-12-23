<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos as OtrosPagosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar otros pagos aplicables."
 */
class OtrosPagosElement extends ElementData
{
    # Elements
    protected OtrosPagosElements\OtroPagoElement $OtroPago;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
