<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\CfdiRelacionados;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\CfdiRelacionados\CfdiRelacionado as CfdiRelacionadoAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para precisar la información de los comprobantes relacionados."
 */
class CfdiRelacionadoElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(CfdiRelacionadoAttributes\UUIDAttribute::class)]
        public CfdiRelacionadoAttributes\UUIDAttribute $UUID
    )
    {}
}
