<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\ParteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para precisar la unidad de medida propia de la operación del emisor, aplicable para la cantidad expresada en la parte. La unidad debe corresponder con la descripción de la parte. "
 */
class UnidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Unidad';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ParteEnum::Unidad;
}
