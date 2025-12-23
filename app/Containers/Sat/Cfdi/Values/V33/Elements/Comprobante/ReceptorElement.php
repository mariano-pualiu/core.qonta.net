<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Receptor as ReceptorAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para precisar la información del contribuyente receptor del comprobante."
 */
class ReceptorElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ReceptorAttributes\RfcAttribute::class)]
        public ReceptorAttributes\RfcAttribute $Rfc,

        #[WithCastable(ReceptorAttributes\NombreAttribute::class)]
        public ?ReceptorAttributes\NombreAttribute $Nombre = null,

        #[WithCastable(ReceptorAttributes\ResidenciaFiscalAttribute::class)]
        public ?ReceptorAttributes\ResidenciaFiscalAttribute $ResidenciaFiscal = null,

        #[WithCastable(ReceptorAttributes\NumRegIdTribAttribute::class)]
        public ?ReceptorAttributes\NumRegIdTribAttribute $NumRegIdTrib = null,

        #[WithCastable(ReceptorAttributes\UsoCFDIAttribute::class)]
        public ReceptorAttributes\UsoCFDIAttribute $UsoCFDI
    )
    {}
}
