<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\DeduccionesEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el total de los impuestos federales retenidos, es decir, donde la clave de tipo de deducción sea 002 correspondiente a ISR."
 */
class TotalImpuestosRetenidosAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalImpuestosRetenidos';

    const USE = UseEnum::OPTIONAL;

    const TYPE = DeduccionesEnum::TotalImpuestosRetenidos;
}
