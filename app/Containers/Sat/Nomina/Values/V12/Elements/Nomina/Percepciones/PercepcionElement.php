<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion as PercepcionAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para expresar la información detallada de una percepción"
 */
class PercepcionElement extends ElementData
{
    # Elements
    protected PercepcionElements\AccionesOTitulosElement $AccionesOTitulos;
    protected PercepcionElements\HorasExtraElement $HorasExtra;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(PercepcionAttributes\TipoPercepcionAttribute::class)]
        public PercepcionAttributes\TipoPercepcionAttribute $TipoPercepcion,

        #[WithCastable(PercepcionAttributes\ClaveAttribute::class)]
        public PercepcionAttributes\ClaveAttribute $Clave,

        #[WithCastable(PercepcionAttributes\ConceptoAttribute::class)]
        public PercepcionAttributes\ConceptoAttribute $Concepto,

        #[WithCastable(PercepcionAttributes\ImporteGravadoAttribute::class)]
        public PercepcionAttributes\ImporteGravadoAttribute $ImporteGravado,

        #[WithCastable(PercepcionAttributes\ImporteExentoAttribute::class)]
        public PercepcionAttributes\ImporteExentoAttribute $ImporteExento
    )
    {}
}
