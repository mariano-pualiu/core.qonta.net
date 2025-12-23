<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para control interno del contribuyente que expresa el folio del comprobante, acepta una cadena de caracteres."
 */
class FolioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Folio';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ComprobanteEnum::Folio;
}
