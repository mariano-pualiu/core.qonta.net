<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Impuestos\Traslados;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado as TrasladoAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para asentar la información detallada de un traslado de impuestos aplicable al presente concepto."
 */
class TrasladoElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(TrasladoAttributes\BaseAttribute::class)]
        public TrasladoAttributes\BaseAttribute $Base,

        #[WithCastable(TrasladoAttributes\ImpuestoAttribute::class)]
        public TrasladoAttributes\ImpuestoAttribute $Impuesto,

        #[WithCastable(TrasladoAttributes\TipoFactorAttribute::class)]
        public TrasladoAttributes\TipoFactorAttribute $TipoFactor,

        #[WithCastable(TrasladoAttributes\TasaOCuotaAttribute::class)]
        public ?TrasladoAttributes\TasaOCuotaAttribute $TasaOCuota = null,

        #[WithCastable(TrasladoAttributes\ImporteAttribute::class)]
        public ?TrasladoAttributes\ImporteAttribute $Importe = null
    )
    {}
}
