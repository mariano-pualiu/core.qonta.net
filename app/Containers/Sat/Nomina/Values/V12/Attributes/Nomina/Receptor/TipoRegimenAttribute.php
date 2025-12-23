<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la expresión de la clave del régimen por el cual se tiene contratado al trabajador."
 */
class TipoRegimenAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoRegimen';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::TipoRegimen;
}
