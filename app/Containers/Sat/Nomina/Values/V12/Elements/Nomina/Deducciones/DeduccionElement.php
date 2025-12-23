<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Deducciones;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones\Deduccion as DeduccionAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para expresar la información detallada de una deducción."
 */
class DeduccionElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(DeduccionAttributes\TipoDeduccionAttribute::class)]
        public DeduccionAttributes\TipoDeduccionAttribute $TipoDeduccion,

        #[WithCastable(DeduccionAttributes\ClaveAttribute::class)]
        public DeduccionAttributes\ClaveAttribute $Clave,

        #[WithCastable(DeduccionAttributes\ConceptoAttribute::class)]
        public DeduccionAttributes\ConceptoAttribute $Concepto,

        #[WithCastable(DeduccionAttributes\ImporteAttribute::class)]
        public DeduccionAttributes\ImporteAttribute $Importe
    )
    {}
}
