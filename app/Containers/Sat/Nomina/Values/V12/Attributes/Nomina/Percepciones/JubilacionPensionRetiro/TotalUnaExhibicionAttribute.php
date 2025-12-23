<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\JubilacionPensionRetiroEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional que indica el monto total del pago cuando se realiza en una sola exhibición."
 */
class TotalUnaExhibicionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalUnaExhibicion';

    const USE = UseEnum::OPTIONAL;

    const TYPE = JubilacionPensionRetiroEnum::TotalUnaExhibicion;
}
