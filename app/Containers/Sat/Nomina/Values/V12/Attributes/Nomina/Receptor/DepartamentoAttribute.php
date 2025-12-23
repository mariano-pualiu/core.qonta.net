<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para la expresión del departamento o área a la que pertenece el trabajador."
 */
class DepartamentoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Departamento';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::Departamento;
}
