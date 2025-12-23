<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\PercepcionesEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el total de percepciones brutas (gravadas y exentas) por sueldos y salarios y conceptos asimilados a salarios."
 */
class TotalSueldosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalSueldos';

    const USE = UseEnum::OPTIONAL;

    const TYPE = PercepcionesEnum::TotalSueldos;
}
