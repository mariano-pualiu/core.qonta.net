<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos\Traslados as TrasladosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para capturar los impuestos trasladados aplicables. Es requerido cuando en los conceptos se registre un impuesto trasladado."
 */
class TrasladosElement extends ElementData
{
    # Elements
    protected TrasladosElements\TrasladoElement $Traslado;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
