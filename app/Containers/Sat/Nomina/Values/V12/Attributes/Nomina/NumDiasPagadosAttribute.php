<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la expresión del número o la fracción de días pagados."
 */
class NumDiasPagadosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NumDiasPagados';

    const USE = UseEnum::REQUIRED;

    const TYPE = NominaEnum::NumDiasPagados;
}
