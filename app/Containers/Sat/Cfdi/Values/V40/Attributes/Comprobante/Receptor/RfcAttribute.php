<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar la Clave del Registro Federal de Contribuyentes correspondiente al contribuyente receptor del comprobante."
 */
class RfcAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Rfc';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::Rfc;
}
