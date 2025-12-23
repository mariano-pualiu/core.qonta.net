<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para representar el importe total de los descuentos aplicables antes de impuestos. No se permiten valores negativos. Se debe registrar cuando existan conceptos con descuento."
 */
class DescuentoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Descuento';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ComprobanteEnum::Descuento;
}
