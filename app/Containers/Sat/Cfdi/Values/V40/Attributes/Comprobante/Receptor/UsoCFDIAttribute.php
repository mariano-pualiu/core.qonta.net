<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la clave del uso que dará a esta factura el receptor del CFDI."
 */
class UsoCFDIAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'UsoCFDI';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::UsoCFDI;
}
