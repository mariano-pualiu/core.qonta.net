<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones\Deduccion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Deducciones\DeduccionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la clave de deducción de nómina propia de la contabilidad de cada patrón, puede conformarse desde 3 hasta 15 caracteres."
 */
class ClaveAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Clave';

    const USE = UseEnum::REQUIRED;

    const TYPE = DeduccionEnum::Clave;
}
