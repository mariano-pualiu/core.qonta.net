<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\PercepcionesEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el importe exento y gravado de las claves tipo percepción 039 Jubilaciones, pensiones o haberes de retiro en una exhibición y 044 Jubilaciones, pensiones o haberes de retiro en parcialidades."
 */
class TotalJubilacionPensionRetiroAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalJubilacionPensionRetiro';

    const USE = UseEnum::OPTIONAL;

    const TYPE = PercepcionesEnum::TotalJubilacionPensionRetiro;
}
