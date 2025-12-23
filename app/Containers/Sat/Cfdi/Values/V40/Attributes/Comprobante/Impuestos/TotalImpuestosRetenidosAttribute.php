<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\ImpuestosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el total de los impuestos retenidos que se desprenden de los conceptos expresados en el comprobante fiscal digital por Internet. No se permiten valores negativos. Es requerido cuando en los conceptos se registren impuestos retenidos."
 */
class TotalImpuestosRetenidosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalImpuestosRetenidos';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ImpuestosEnum::TotalImpuestosRetenidos;
}
