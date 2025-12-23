<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\PercepcionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la Clave agrupadora bajo la cual se clasifica la percepción."
 */
class TipoPercepcionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoPercepcion';

    const USE = UseEnum::REQUIRED;

    const TYPE = PercepcionEnum::TipoPercepcion;
}
