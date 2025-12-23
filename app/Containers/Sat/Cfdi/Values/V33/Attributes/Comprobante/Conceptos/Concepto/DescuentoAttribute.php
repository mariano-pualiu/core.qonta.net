<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\ConceptoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para representar el importe de los descuentos aplicables al concepto. No se permiten valores negativos."
 */
class DescuentoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Descuento';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ConceptoEnum::Descuento;
}
