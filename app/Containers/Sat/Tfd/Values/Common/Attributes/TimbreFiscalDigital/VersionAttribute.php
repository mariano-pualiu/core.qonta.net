<?php

namespace App\Containers\Sat\Tfd\Values\Common\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\Common\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;

/**
 * "Atributo requerido para la expresión de la versión del estándar del Timbre Fiscal Digital"
 */
class VersionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Version';

    const USE = UseEnum::OPTIONAL;

    const TYPE = TimbreFiscalDigitalEnum::Version;
}
