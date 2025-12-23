<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\JubilacionPensionRetiroEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el monto diario percibido por jubilación, pensiones o haberes de retiro cuando se realiza en parcialidades."
 */
class MontoDiarioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'MontoDiario';

    const USE = UseEnum::OPTIONAL;

    const TYPE = JubilacionPensionRetiroEnum::MontoDiario;
}
