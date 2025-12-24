<?php

namespace App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante;

use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;
use App\Containers\Sat\Cfdi\Enums\Common\ComprobanteEnum;

/**
 * "Atributo requerido con valor prefijado a 4.0 que indica la versión del estándar bajo el que se encuentra expresado el comprobante."
 */
class VersionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Version';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ComprobanteEnum::Version;
}
