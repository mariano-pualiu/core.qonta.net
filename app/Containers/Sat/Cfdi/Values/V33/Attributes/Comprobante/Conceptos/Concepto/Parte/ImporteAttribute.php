<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Parte;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\ParteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para precisar el importe total de los bienes o servicios de la presente parte. Debe ser equivalente al resultado de multiplicar la cantidad por el valor unitario expresado en la parte. No se permiten valores negativos."
 */
class ImporteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Importe';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ParteEnum::Importe;
}
