<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para señalar el importe del impuesto trasladado que aplica al concepto. No se permiten valores negativos. Es requerido cuando TipoFactor sea Tasa o Cuota"
 */
class ImporteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Importe';

    const USE = UseEnum::OPTIONAL;

    const TYPE = TrasladoEnum::Importe;
}
