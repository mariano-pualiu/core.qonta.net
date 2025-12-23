<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\Retencion;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\RetencionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la clave del tipo de impuesto retenido aplicable al concepto."
 */
class ImpuestoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Impuesto';

    const USE = UseEnum::REQUIRED;

    const TYPE = RetencionEnum::Impuesto;
}
