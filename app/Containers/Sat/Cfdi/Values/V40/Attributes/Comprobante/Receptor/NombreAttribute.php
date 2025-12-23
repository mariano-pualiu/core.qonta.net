<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar el nombre(s), primer apellido, segundo apellido, según corresponda, denominación o razón social del contribuyente, inscrito en el RFC, del receptor del comprobante."
 */
class NombreAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Nombre';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::Nombre;
}
