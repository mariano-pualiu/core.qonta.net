<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos as ConceptosAttributes;
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
