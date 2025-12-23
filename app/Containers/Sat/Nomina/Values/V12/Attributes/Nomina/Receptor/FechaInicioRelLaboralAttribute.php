<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar la fecha de inicio de la relación laboral entre el empleador y el empleado. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales."
 */
class FechaInicioRelLaboralAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'FechaInicioRelLaboral';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::FechaInicioRelLaboral;
}
