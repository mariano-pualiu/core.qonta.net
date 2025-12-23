<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Impuestos;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados as TrasladosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para asentar los impuestos trasladados aplicables al presente concepto."
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
