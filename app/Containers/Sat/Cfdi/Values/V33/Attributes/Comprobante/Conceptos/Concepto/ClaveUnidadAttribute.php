<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\ConceptoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para precisar la clave de unidad de medida estandarizada aplicable para la cantidad expresada en el concepto. La unidad debe corresponder con la descripción del concepto."
 */
class ClaveUnidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ClaveUnidad';

    const USE = UseEnum::REQUIRED;

    const TYPE = ConceptoEnum::ClaveUnidad;
}
