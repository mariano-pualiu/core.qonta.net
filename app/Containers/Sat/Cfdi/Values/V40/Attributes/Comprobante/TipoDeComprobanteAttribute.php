<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la clave del efecto del comprobante fiscal para el contribuyente emisor."
 */
class TipoDeComprobanteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoDeComprobante';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::TipoDeComprobante;
}
