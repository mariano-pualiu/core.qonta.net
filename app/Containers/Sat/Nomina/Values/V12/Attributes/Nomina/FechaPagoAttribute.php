<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la expresión de la fecha efectiva de erogación del gasto. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601."
 */
class FechaPagoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'FechaPago';

    const USE = UseEnum::REQUIRED;

    const TYPE = NominaEnum::FechaPago;
}
