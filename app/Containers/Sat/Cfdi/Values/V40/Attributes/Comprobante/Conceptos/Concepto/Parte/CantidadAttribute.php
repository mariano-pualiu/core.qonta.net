<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\ParteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para precisar la cantidad de bienes o servicios del tipo particular definido por la presente parte."
 */
class CantidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Cantidad';

    const USE = UseEnum::REQUIRED;

    const TYPE = ParteEnum::Cantidad;
}
