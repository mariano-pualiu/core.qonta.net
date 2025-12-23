<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones as DeduccionesAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para expresar las deducciones aplicables."
 */
class DeduccionesElement extends ElementData
{
    # Elements
    protected DeduccionesElements\DeduccionElement $Deduccion;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(DeduccionesAttributes\TotalOtrasDeduccionesAttribute::class)]
        public ?DeduccionesAttributes\TotalOtrasDeduccionesAttribute $TotalOtrasDeducciones = null,

        #[WithCastable(DeduccionesAttributes\TotalImpuestosRetenidosAttribute::class)]
        public ?DeduccionesAttributes\TotalImpuestosRetenidosAttribute $TotalImpuestosRetenidos = null
    )
    {}
}
