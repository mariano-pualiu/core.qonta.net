<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\ConceptoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar si la operación comercial es objeto o no de impuesto."
 */
class ObjetoImpAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ObjetoImp';

    const USE = UseEnum::REQUIRED;

    const TYPE = ConceptoEnum::ObjetoImp;
}
