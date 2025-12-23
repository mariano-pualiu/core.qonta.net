<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\PercepcionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la clave de percepción de nómina propia de la contabilidad de cada patrón, puede conformarse desde 3 hasta 15 caracteres."
 */
class ClaveAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Clave';

    const USE = UseEnum::REQUIRED;

    const TYPE = PercepcionEnum::Clave;
}
