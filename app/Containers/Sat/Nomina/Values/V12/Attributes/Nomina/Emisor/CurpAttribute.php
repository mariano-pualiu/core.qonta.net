<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar la CURP del emisor del comprobante de nómina cuando es una persona física."
 */
class CurpAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Curp';

    const USE = UseEnum::OPTIONAL;

    const TYPE = EmisorEnum::Curp;
}
