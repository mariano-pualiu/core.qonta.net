<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para incorporar el código postal del lugar de expedición del comprobante (domicilio de la matriz o de la sucursal)."
 */
class LugarExpedicionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'LugarExpedicion';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::LugarExpedicion;
}
