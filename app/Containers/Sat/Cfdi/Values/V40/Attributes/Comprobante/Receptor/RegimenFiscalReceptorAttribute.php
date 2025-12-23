<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para incorporar la clave del régimen fiscal del contribuyente receptor al que aplicará el efecto fiscal de este comprobante."
 */
class RegimenFiscalReceptorAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RegimenFiscalReceptor';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::RegimenFiscalReceptor;
}
