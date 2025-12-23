<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\CfdiRelacionados as CfdiRelacionadosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para precisar la información de los comprobantes relacionados."
 */
class CfdiRelacionadosElement extends ElementData
{
    # Elements
    protected CfdiRelacionadosElements\CfdiRelacionadoElement $CfdiRelacionado;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(CfdiRelacionadosAttributes\TipoRelacionAttribute::class)]
        public CfdiRelacionadosAttributes\TipoRelacionAttribute $TipoRelacion
    )
    {}
}
