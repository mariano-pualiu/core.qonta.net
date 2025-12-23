<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Emisor;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para registrar el nombre, denominación o razón social del contribuyente emisor del comprobante."
 */
class NombreAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Nombre';

    const USE = UseEnum::OPTIONAL;

    const TYPE = EmisorEnum::Nombre;
}
