<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Incapacidades;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad as IncapacidadAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para expresar información de las incapacidades."
 */
class IncapacidadElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(IncapacidadAttributes\DiasIncapacidadAttribute::class)]
        public IncapacidadAttributes\DiasIncapacidadAttribute $DiasIncapacidad,

        #[WithCastable(IncapacidadAttributes\TipoIncapacidadAttribute::class)]
        public IncapacidadAttributes\TipoIncapacidadAttribute $TipoIncapacidad,

        #[WithCastable(IncapacidadAttributes\ImporteMonetarioAttribute::class)]
        public ?IncapacidadAttributes\ImporteMonetarioAttribute $ImporteMonetario = null
    )
    {}
}
