<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos as ImpuestosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para capturar los impuestos aplicables al presente concepto."
 */
class ImpuestosElement extends ElementData
{
    # Elements
    protected ImpuestosElements\TrasladosElement $Traslados;
    protected ImpuestosElements\RetencionesElement $Retenciones;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
