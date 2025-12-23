<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\DeduccionesEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el total de deducciones que se relacionan en el comprobante, donde la clave de tipo de deducción sea distinta a la 002 correspondiente a ISR."
 */
class TotalOtrasDeduccionesAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalOtrasDeducciones';

    const USE = UseEnum::OPTIONAL;

    const TYPE = DeduccionesEnum::TotalOtrasDeducciones;
}
