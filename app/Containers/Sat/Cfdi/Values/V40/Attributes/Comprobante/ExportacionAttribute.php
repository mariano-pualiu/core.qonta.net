<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar si el comprobante ampara una operación de exportación."
 */
class ExportacionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Exportacion';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::Exportacion;
}
