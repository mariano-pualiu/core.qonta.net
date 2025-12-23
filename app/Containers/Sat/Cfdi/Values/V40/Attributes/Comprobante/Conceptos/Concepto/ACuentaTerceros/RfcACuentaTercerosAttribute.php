<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\ACuentaTerceros;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\ACuentaTercerosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar la Clave del Registro Federal de Contribuyentes del contribuyente Tercero, a cuenta del que se realiza la operación."
 */
class RfcACuentaTercerosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RfcACuentaTerceros';

    const USE = UseEnum::REQUIRED;

    const TYPE = ACuentaTercerosEnum::RfcACuentaTerceros;
}
