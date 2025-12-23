<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\PercepcionesEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el importe exento y gravado de las claves tipo percepción 022 Prima por Antigüedad, 023 Pagos por separación y 025 Indemnizaciones."
 */
class TotalSeparacionIndemnizacionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalSeparacionIndemnizacion';

    const USE = UseEnum::OPTIONAL;

    const TYPE = PercepcionesEnum::TotalSeparacionIndemnizacion;
}
