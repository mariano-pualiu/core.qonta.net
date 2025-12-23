<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V33\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para identificar la clave de la moneda utilizada para expresar los montos, cuando se usa moneda nacional se registra MXN. Conforme con la especificación ISO 4217."
 */
class MonedaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Moneda';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::Moneda;
}
