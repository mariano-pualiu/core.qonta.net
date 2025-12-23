<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar el código postal del domicilio fiscal del receptor del comprobante."
 */
class DomicilioFiscalReceptorAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'DomicilioFiscalReceptor';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::DomicilioFiscalReceptor;
}
