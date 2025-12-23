<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos as ConceptosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para listar los conceptos cubiertos por el comprobante."
 */
class ConceptosElement extends ElementData
{
    # Elements
    protected ConceptosElements\ConceptoElement $Concepto;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
