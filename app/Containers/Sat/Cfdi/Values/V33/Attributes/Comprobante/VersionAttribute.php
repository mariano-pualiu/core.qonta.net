<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V33\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido con valor prefijado a 3.3 que indica la versión del estándar bajo el que se encuentra expresado el comprobante."
 */
class VersionAttribute extends AttributeData
{
    const FIXED = 3.3;

    const NAME = 'Version';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::Version;
}
