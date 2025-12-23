<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPagoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la clave agrupadora bajo la cual se clasifica el otro pago."
 */
class TipoOtroPagoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoOtroPago';

    const USE = UseEnum::REQUIRED;

    const TYPE = OtroPagoEnum::TipoOtroPago;
}
