<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para representar la suma de las deducciones aplicables."
 */
class TotalDeduccionesAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalDeducciones';

    const USE = UseEnum::OPTIONAL;

    const TYPE = NominaEnum::TotalDeducciones;
}
