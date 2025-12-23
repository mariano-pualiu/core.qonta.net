<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\HorasExtra;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\Percepcion\HorasExtraEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el número de horas extra trabajadas en el periodo."
 */
class HorasExtraAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'HorasExtra';

    const USE = UseEnum::REQUIRED;

    const TYPE = HorasExtraEnum::HorasExtra;
}
