<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\HorasExtra;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\Percepcion\HorasExtraEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el tipo de pago de las horas extra."
 */
class TipoHorasAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoHoras';

    const USE = UseEnum::REQUIRED;

    const TYPE = HorasExtraEnum::TipoHoras;
}
