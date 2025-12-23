<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Emisor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para incorporar la clave del régimen del contribuyente emisor al que aplicará el efecto fiscal de este comprobante."
 */
class RegimenFiscalAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RegimenFiscal';

    const USE = UseEnum::REQUIRED;

    const TYPE = EmisorEnum::RegimenFiscal;
}
