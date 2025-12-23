<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el registro patronal, clave de ramo - pagaduría o la que le asigne la institución de seguridad social al patrón, a 20 posiciones máximo. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales."
 */
class RegistroPatronalAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RegistroPatronal';

    const USE = UseEnum::OPTIONAL;

    const TYPE = EmisorEnum::RegistroPatronal;
}
