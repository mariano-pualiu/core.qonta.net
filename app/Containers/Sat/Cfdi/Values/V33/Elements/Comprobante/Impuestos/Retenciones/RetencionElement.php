<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos\Retenciones;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos\Retenciones\Retencion as RetencionAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para la información detallada de una retención de impuesto específico."
 */
class RetencionElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(RetencionAttributes\ImpuestoAttribute::class)]
        public RetencionAttributes\ImpuestoAttribute $Impuesto,

        #[WithCastable(RetencionAttributes\ImporteAttribute::class)]
        public RetencionAttributes\ImporteAttribute $Importe
    )
    {}
}
