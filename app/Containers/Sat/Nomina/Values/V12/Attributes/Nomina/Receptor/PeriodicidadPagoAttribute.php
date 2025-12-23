<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la forma en que se establece el pago del salario."
 */
class PeriodicidadPagoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'PeriodicidadPago';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::PeriodicidadPago;
}
