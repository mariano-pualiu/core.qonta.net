<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V33\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para precisar la serie para control interno del contribuyente. Este atributo acepta una cadena de caracteres."
 */
class SerieAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Serie';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ComprobanteEnum::Serie;
}
