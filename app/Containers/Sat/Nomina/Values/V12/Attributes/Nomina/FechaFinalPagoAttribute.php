<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la expresión de la fecha final del período de pago. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601."
 */
class FechaFinalPagoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'FechaFinalPago';

    const USE = UseEnum::REQUIRED;

    const TYPE = NominaEnum::FechaFinalPago;
}
