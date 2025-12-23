<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\ConceptoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para precisar el valor o precio unitario del bien o servicio cubierto por el presente concepto."
 */
class ValorUnitarioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ValorUnitario';

    const USE = UseEnum::REQUIRED;

    const TYPE = ConceptoEnum::ValorUnitario;
}
