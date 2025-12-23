<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos as ImpuestosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar el resumen de los impuestos aplicables."
 */
class ImpuestosElement extends ElementData
{
    # Elements
    protected ImpuestosElements\RetencionesElement $Retenciones;
    protected ImpuestosElements\TrasladosElement $Traslados;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ImpuestosAttributes\TotalImpuestosRetenidosAttribute::class)]
        public ?ImpuestosAttributes\TotalImpuestosRetenidosAttribute $TotalImpuestosRetenidos = null,

        #[WithCastable(ImpuestosAttributes\TotalImpuestosTrasladadosAttribute::class)]
        public ?ImpuestosAttributes\TotalImpuestosTrasladadosAttribute $TotalImpuestosTrasladados = null
    )
    {}
}
