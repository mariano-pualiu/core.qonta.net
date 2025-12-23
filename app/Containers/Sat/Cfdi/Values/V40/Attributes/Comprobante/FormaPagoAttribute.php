<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar la clave de la forma de pago de los bienes o servicios amparados por el comprobante."
 */
class FormaPagoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'FormaPago';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ComprobanteEnum::FormaPago;
}
