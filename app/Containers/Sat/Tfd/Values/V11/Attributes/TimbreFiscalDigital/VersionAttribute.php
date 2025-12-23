<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la expresión de la versión del estándar del Timbre Fiscal Digital"
 */
class VersionAttribute extends AttributeData
{
    const FIXED = 1.1;

    const NAME = 'Version';

    const USE = UseEnum::REQUIRED;

    const TYPE = TimbreFiscalDigitalEnum::Version;
}
