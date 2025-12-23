<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el número de empleado de 1 a 15 posiciones."
 */
class NumEmpleadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NumEmpleado';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::NumEmpleado;
}
