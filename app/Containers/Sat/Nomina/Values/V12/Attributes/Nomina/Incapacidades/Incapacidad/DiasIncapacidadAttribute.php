<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Incapacidades\IncapacidadEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el número de días enteros que el trabajador se incapacitó en el periodo."
 */
class DiasIncapacidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'DiasIncapacidad';

    const USE = UseEnum::REQUIRED;

    const TYPE = IncapacidadEnum::DiasIncapacidad;
}
