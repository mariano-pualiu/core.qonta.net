<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la clave del tipo de impuesto trasladado aplicable al concepto."
 */
class ImpuestoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Impuesto';

    const USE = UseEnum::REQUIRED;

    const TYPE = TrasladoEnum::Impuesto;
}
