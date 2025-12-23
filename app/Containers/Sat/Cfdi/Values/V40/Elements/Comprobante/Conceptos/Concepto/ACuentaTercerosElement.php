<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\ACuentaTerceros as ACuentaTercerosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para registrar información del contribuyente Tercero, a cuenta del que se realiza la operación."
 */
class ACuentaTercerosElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ACuentaTercerosAttributes\RfcACuentaTercerosAttribute::class)]
        public ACuentaTercerosAttributes\RfcACuentaTercerosAttribute $RfcACuentaTerceros,

        #[WithCastable(ACuentaTercerosAttributes\NombreACuentaTercerosAttribute::class)]
        public ACuentaTercerosAttributes\NombreACuentaTercerosAttribute $NombreACuentaTerceros,

        #[WithCastable(ACuentaTercerosAttributes\RegimenFiscalACuentaTercerosAttribute::class)]
        public ACuentaTercerosAttributes\RegimenFiscalACuentaTercerosAttribute $RegimenFiscalACuentaTerceros,

        #[WithCastable(ACuentaTercerosAttributes\DomicilioFiscalACuentaTercerosAttribute::class)]
        public ACuentaTercerosAttributes\DomicilioFiscalACuentaTercerosAttribute $DomicilioFiscalACuentaTerceros
    )
    {}
}
