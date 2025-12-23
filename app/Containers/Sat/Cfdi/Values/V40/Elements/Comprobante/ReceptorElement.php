<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor as ReceptorAttributes;
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
        public ReceptorAttributes\NombreAttribute $Nombre,

        #[WithCastable(ReceptorAttributes\DomicilioFiscalReceptorAttribute::class)]
        public ReceptorAttributes\DomicilioFiscalReceptorAttribute $DomicilioFiscalReceptor,

        #[WithCastable(ReceptorAttributes\ResidenciaFiscalAttribute::class)]
        public ?ReceptorAttributes\ResidenciaFiscalAttribute $ResidenciaFiscal = null,

        #[WithCastable(ReceptorAttributes\NumRegIdTribAttribute::class)]
        public ?ReceptorAttributes\NumRegIdTribAttribute $NumRegIdTrib = null,

        #[WithCastable(ReceptorAttributes\RegimenFiscalReceptorAttribute::class)]
        public ReceptorAttributes\RegimenFiscalReceptorAttribute $RegimenFiscalReceptor,

        #[WithCastable(ReceptorAttributes\UsoCFDIAttribute::class)]
        public ReceptorAttributes\UsoCFDIAttribute $UsoCFDI
    )
    {}
}
