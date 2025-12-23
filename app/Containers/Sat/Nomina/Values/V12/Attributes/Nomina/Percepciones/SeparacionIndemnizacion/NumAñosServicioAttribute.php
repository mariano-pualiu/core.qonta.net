<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\SeparacionIndemnizacion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\SeparacionIndemnizacionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el número de años de servicio del trabajador. Se redondea al entero superior si la cifra contiene años y meses y hay más de 6 meses."
 */
class NumAñosServicioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NumAñosServicio';

    const USE = UseEnum::REQUIRED;

    const TYPE = SeparacionIndemnizacionEnum::NumAñosServicio;
}
