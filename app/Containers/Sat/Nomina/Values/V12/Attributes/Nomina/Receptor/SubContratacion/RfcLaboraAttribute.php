<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor\SubContratacion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Receptor\SubContratacionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el RFC de la persona que subcontrata."
 */
class RfcLaboraAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RfcLabora';

    const USE = UseEnum::REQUIRED;

    const TYPE = SubContratacionEnum::RfcLabora;
}
