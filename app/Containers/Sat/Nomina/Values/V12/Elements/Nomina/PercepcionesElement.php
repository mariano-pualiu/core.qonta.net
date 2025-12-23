<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones as PercepcionesAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar las percepciones aplicables."
 */
class PercepcionesElement extends ElementData
{
    # Elements
    protected PercepcionesElements\PercepcionElement $Percepcion;
    protected PercepcionesElements\JubilacionPensionRetiroElement $JubilacionPensionRetiro;
    protected PercepcionesElements\SeparacionIndemnizacionElement $SeparacionIndemnizacion;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(PercepcionesAttributes\TotalSueldosAttribute::class)]
        public ?PercepcionesAttributes\TotalSueldosAttribute $TotalSueldos = null,

        #[WithCastable(PercepcionesAttributes\TotalSeparacionIndemnizacionAttribute::class)]
        public ?PercepcionesAttributes\TotalSeparacionIndemnizacionAttribute $TotalSeparacionIndemnizacion = null,

        #[WithCastable(PercepcionesAttributes\TotalJubilacionPensionRetiroAttribute::class)]
        public ?PercepcionesAttributes\TotalJubilacionPensionRetiroAttribute $TotalJubilacionPensionRetiro = null,

        #[WithCastable(PercepcionesAttributes\TotalGravadoAttribute::class)]
        public PercepcionesAttributes\TotalGravadoAttribute $TotalGravado,

        #[WithCastable(PercepcionesAttributes\TotalExentoAttribute::class)]
        public PercepcionesAttributes\TotalExentoAttribute $TotalExento
    )
    {}
}
