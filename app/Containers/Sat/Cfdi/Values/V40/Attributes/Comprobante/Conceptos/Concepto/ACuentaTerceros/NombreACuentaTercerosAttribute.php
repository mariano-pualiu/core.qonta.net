<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\ACuentaTerceros;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\ACuentaTercerosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar el nombre, denominación o razón social del contribuyente Tercero correspondiente con el Rfc, a cuenta del que se realiza la operación."
 */
class NombreACuentaTercerosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NombreACuentaTerceros';

    const USE = UseEnum::REQUIRED;

    const TYPE = ACuentaTercerosEnum::NombreACuentaTerceros;
}
