<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\ACuentaTerceros;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\ACuentaTercerosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para incorporar el código postal del domicilio fiscal del Tercero, a cuenta del que se realiza la operación."
 */
class DomicilioFiscalACuentaTercerosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'DomicilioFiscalACuentaTerceros';

    const USE = UseEnum::REQUIRED;

    const TYPE = ACuentaTercerosEnum::DomicilioFiscalACuentaTerceros;
}
