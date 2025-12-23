<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones\Deduccion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Deducciones\DeduccionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar la clave agrupadora que clasifica la deducción."
 */
class TipoDeduccionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoDeduccion';

    const USE = UseEnum::REQUIRED;

    const TYPE = DeduccionEnum::TipoDeduccion;
}
