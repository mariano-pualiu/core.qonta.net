<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar el valor de la tasa o cuota del impuesto que se traslada por los conceptos amparados en el comprobante."
 */
class TasaOCuotaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TasaOCuota';

    const USE = UseEnum::REQUIRED;

    const TYPE = TrasladoEnum::TasaOCuota;
}
