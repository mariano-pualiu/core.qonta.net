<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para la expresión del puesto asignado al empleado o actividad que realiza."
 */
class PuestoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Puesto';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::Puesto;
}
