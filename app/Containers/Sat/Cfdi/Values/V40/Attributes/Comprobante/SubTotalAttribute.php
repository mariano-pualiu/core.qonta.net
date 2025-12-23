<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para representar la suma de los importes de los conceptos antes de descuentos e impuesto. No se permiten valores negativos."
 */
class SubTotalAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'SubTotal';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::SubTotal;
}
