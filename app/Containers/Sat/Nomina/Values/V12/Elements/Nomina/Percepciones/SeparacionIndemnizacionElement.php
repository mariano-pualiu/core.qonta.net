<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\SeparacionIndemnizacion as SeparacionIndemnizacionAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar la información detallada de otros pagos por separación."
 */
class SeparacionIndemnizacionElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(SeparacionIndemnizacionAttributes\TotalPagadoAttribute::class)]
        public SeparacionIndemnizacionAttributes\TotalPagadoAttribute $TotalPagado,

        #[WithCastable(SeparacionIndemnizacionAttributes\NumAñosServicioAttribute::class)]
        public SeparacionIndemnizacionAttributes\NumAñosServicioAttribute $NumAñosServicio,

        #[WithCastable(SeparacionIndemnizacionAttributes\UltimoSueldoMensOrdAttribute::class)]
        public SeparacionIndemnizacionAttributes\UltimoSueldoMensOrdAttribute $UltimoSueldoMensOrd,

        #[WithCastable(SeparacionIndemnizacionAttributes\IngresoAcumulableAttribute::class)]
        public SeparacionIndemnizacionAttributes\IngresoAcumulableAttribute $IngresoAcumulable,

        #[WithCastable(SeparacionIndemnizacionAttributes\IngresoNoAcumulableAttribute::class)]
        public SeparacionIndemnizacionAttributes\IngresoNoAcumulableAttribute $IngresoNoAcumulable
    )
    {}
}
