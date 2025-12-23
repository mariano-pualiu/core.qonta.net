<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la expresión de la versión del complemento."
 */
class VersionAttribute extends AttributeData
{
    const FIXED = 1.2;

    const NAME = 'Version';

    const USE = UseEnum::REQUIRED;

    const TYPE = NominaEnum::Version;
}
