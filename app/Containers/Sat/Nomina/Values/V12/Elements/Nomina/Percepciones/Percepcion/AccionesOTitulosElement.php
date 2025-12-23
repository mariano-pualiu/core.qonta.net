<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\Percepcion;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\AccionesOTitulos as AccionesOTitulosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar ingresos por acciones o títulos valor que representan bienes. Se vuelve requerido cuando existan ingresos por sueldos derivados de adquisición de acciones o títulos (Art. 94, fracción VII LISR)."
 */
class AccionesOTitulosElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(AccionesOTitulosAttributes\ValorMercadoAttribute::class)]
        public AccionesOTitulosAttributes\ValorMercadoAttribute $ValorMercado,

        #[WithCastable(AccionesOTitulosAttributes\PrecioAlOtorgarseAttribute::class)]
        public AccionesOTitulosAttributes\PrecioAlOtorgarseAttribute $PrecioAlOtorgarse
    )
    {}
}
