<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Emisor as EmisorAttributes;
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
        public ?EmisorAttributes\NombreAttribute $Nombre = null,

        #[WithCastable(EmisorAttributes\RegimenFiscalAttribute::class)]
        public EmisorAttributes\RegimenFiscalAttribute $RegimenFiscal
    )
    {}
}
