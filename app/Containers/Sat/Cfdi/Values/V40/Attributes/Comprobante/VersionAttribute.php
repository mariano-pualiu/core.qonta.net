<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido con valor prefijado a 4.0 que indica la versión del estándar bajo el que se encuentra expresado el comprobante."
 */
class VersionAttribute extends AttributeData
{
    const FIXED = 4.0;

    const NAME = 'Version';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::Version;
}
