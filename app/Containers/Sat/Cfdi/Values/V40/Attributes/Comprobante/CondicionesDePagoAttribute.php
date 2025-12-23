<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar las condiciones comerciales aplicables para el pago del comprobante fiscal digital por Internet. Este atributo puede ser condicionado mediante atributos o complementos."
 */
class CondicionesDePagoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'CondicionesDePago';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ComprobanteEnum::CondicionesDePago;
}
