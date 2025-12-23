<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones\Deduccion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Deducciones\DeduccionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la descripción del concepto de deducción."
 */
class ConceptoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Concepto';

    const USE = UseEnum::REQUIRED;

    const TYPE = DeduccionEnum::Concepto;
}
