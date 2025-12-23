<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\CuentaPredial;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\CuentaPredialEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para precisar el número de la cuenta predial del inmueble cubierto por el presente concepto, o bien para incorporar los datos de identificación del certificado de participación inmobiliaria no amortizable, tratándose de arrendamiento."
 */
class NumeroAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Numero';

    const USE = UseEnum::REQUIRED;

    const TYPE = CuentaPredialEnum::Numero;
}
