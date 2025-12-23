<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\Retencion;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\RetencionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la tasa o cuota del impuesto que se retiene para el presente concepto."
 */
class TasaOCuotaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TasaOCuota';

    const USE = UseEnum::REQUIRED;

    const TYPE = RetencionEnum::TasaOCuota;
}
