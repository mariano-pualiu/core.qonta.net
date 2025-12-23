<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Emisor as EmisorAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para expresar la información del contribuyente emisor del comprobante."
 */
class EmisorElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(EmisorAttributes\RfcAttribute::class)]
        public EmisorAttributes\RfcAttribute $Rfc,

        #[WithCastable(EmisorAttributes\NombreAttribute::class)]
        public EmisorAttributes\NombreAttribute $Nombre,

        #[WithCastable(EmisorAttributes\RegimenFiscalAttribute::class)]
        public EmisorAttributes\RegimenFiscalAttribute $RegimenFiscal,

        #[WithCastable(EmisorAttributes\FacAtrAdquirenteAttribute::class)]
        public ?EmisorAttributes\FacAtrAdquirenteAttribute $FacAtrAdquirente = null
    )
    {}
}
