<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\PercepcionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido, representa el importe gravado de un concepto de percepción."
 */
class ImporteGravadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ImporteGravado';

    const USE = UseEnum::REQUIRED;

    const TYPE = PercepcionEnum::ImporteGravado;
}
