<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Impuestos\Retenciones;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\Retencion as RetencionAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para asentar la información detallada de una retención de impuestos aplicable al presente concepto."
 */
class RetencionElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(RetencionAttributes\BaseAttribute::class)]
        public RetencionAttributes\BaseAttribute $Base,

        #[WithCastable(RetencionAttributes\ImpuestoAttribute::class)]
        public RetencionAttributes\ImpuestoAttribute $Impuesto,

        #[WithCastable(RetencionAttributes\TipoFactorAttribute::class)]
        public RetencionAttributes\TipoFactorAttribute $TipoFactor,

        #[WithCastable(RetencionAttributes\TasaOCuotaAttribute::class)]
        public RetencionAttributes\TasaOCuotaAttribute $TasaOCuota,

        #[WithCastable(RetencionAttributes\ImporteAttribute::class)]
        public RetencionAttributes\ImporteAttribute $Importe
    )
    {}
}
