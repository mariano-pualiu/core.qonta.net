<?php

namespace App\Containers\Sat\Nomina\Values\Common\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\Common\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;

/**
 * "Atributo requerido para la expresión de la versión del complemento."
 */
class VersionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Version';

    const USE = UseEnum::OPTIONAL;

    const TYPE = NominaEnum::Version;
}
