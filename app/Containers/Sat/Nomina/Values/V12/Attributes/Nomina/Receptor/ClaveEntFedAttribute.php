<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la clave de la entidad federativa en donde el receptor del recibo prestó el servicio."
 */
class ClaveEntFedAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ClaveEntFed';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::ClaveEntFed;
}
