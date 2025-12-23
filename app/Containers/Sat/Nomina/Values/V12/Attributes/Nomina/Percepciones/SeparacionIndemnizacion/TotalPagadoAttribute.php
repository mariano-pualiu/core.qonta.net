<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\SeparacionIndemnizacion;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\SeparacionIndemnizacionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido que indica el monto total del pago."
 */
class TotalPagadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalPagado';

    const USE = UseEnum::REQUIRED;

    const TYPE = SeparacionIndemnizacionEnum::TotalPagado;
}
