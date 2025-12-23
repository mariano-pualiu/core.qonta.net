<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\ParteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para precisar el valor o precio unitario del bien o servicio cubierto por la presente parte. No se permiten valores negativos."
 */
class ValorUnitarioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ValorUnitario';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ParteEnum::ValorUnitario;
}
