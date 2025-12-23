<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para representar la suma de las percepciones."
 */
class TotalPercepcionesAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalPercepciones';

    const USE = UseEnum::OPTIONAL;

    const TYPE = NominaEnum::TotalPercepciones;
}
