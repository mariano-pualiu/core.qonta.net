<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Incapacidades\IncapacidadEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la razón de la incapacidad."
 */
class TipoIncapacidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoIncapacidad';

    const USE = UseEnum::REQUIRED;

    const TYPE = IncapacidadEnum::TipoIncapacidad;
}
