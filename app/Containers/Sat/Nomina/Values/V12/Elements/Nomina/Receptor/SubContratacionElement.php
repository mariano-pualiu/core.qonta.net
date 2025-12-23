<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Receptor;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor\SubContratacion as SubContratacionAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar la lista de las personas que los subcontrataron."
 */
class SubContratacionElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(SubContratacionAttributes\RfcLaboraAttribute::class)]
        public SubContratacionAttributes\RfcLaboraAttribute $RfcLabora,

        #[WithCastable(SubContratacionAttributes\PorcentajeTiempoAttribute::class)]
        public SubContratacionAttributes\PorcentajeTiempoAttribute $PorcentajeTiempo
    )
    {}
}
