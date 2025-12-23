<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el tipo de contrato que tiene el trabajador."
 */
class TipoContratoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoContrato';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::TipoContrato;
}
