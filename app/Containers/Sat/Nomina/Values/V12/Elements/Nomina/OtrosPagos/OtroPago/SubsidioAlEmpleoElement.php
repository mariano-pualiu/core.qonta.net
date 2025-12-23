<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleo as SubsidioAlEmpleoAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar la información referente al subsidio al empleo del trabajador."
 */
class SubsidioAlEmpleoElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(SubsidioAlEmpleoAttributes\SubsidioCausadoAttribute::class)]
        public SubsidioAlEmpleoAttributes\SubsidioCausadoAttribute $SubsidioCausado
    )
    {}
}
