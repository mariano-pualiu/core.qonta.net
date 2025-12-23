<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\SeparacionIndemnizacion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\SeparacionIndemnizacionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido que indica el último sueldo mensual ordinario."
 */
class UltimoSueldoMensOrdAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'UltimoSueldoMensOrd';

    const USE = UseEnum::REQUIRED;

    const TYPE = SeparacionIndemnizacionEnum::UltimoSueldoMensOrd;
}
