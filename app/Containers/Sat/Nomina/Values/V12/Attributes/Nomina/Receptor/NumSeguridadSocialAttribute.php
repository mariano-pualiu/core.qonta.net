<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el número de seguridad social del trabajador. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales."
 */
class NumSeguridadSocialAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NumSeguridadSocial';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::NumSeguridadSocial;
}
