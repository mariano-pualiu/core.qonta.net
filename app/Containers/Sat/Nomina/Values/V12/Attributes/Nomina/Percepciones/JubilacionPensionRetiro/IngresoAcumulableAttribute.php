<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\JubilacionPensionRetiroEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar los ingresos acumulables."
 */
class IngresoAcumulableAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'IngresoAcumulable';

    const USE = UseEnum::REQUIRED;

    const TYPE = JubilacionPensionRetiroEnum::IngresoAcumulable;
}
