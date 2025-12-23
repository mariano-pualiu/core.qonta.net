<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor\SubContratacion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Receptor\SubContratacionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el porcentaje del tiempo que prestó sus servicios con el RFC que lo subcontrata."
 */
class PorcentajeTiempoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'PorcentajeTiempo';

    const USE = UseEnum::REQUIRED;

    const TYPE = SubContratacionEnum::PorcentajeTiempo;
}
