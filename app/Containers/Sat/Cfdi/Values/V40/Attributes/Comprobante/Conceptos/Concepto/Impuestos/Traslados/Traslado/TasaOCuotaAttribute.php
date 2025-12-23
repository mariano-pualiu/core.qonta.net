<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para señalar el valor de la tasa o cuota del impuesto que se traslada para el presente concepto. Es requerido cuando el atributo TipoFactor tenga una clave que corresponda a Tasa o Cuota."
 */
class TasaOCuotaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TasaOCuota';

    const USE = UseEnum::OPTIONAL;

    const TYPE = TrasladoEnum::TasaOCuota;
}
