<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Emisor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar el nombre, denominación o razón social del contribuyente inscrito en el RFC, del emisor del comprobante."
 */
class NombreAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Nombre';

    const USE = UseEnum::REQUIRED;

    const TYPE = EmisorEnum::Nombre;
}
