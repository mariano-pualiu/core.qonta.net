<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPagoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido, representa la clave de otro pago de nómina propia de la contabilidad de cada patrón, puede conformarse desde 3 hasta 15 caracteres."
 */
class ClaveAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Clave';

    const USE = UseEnum::REQUIRED;

    const TYPE = OtroPagoEnum::Clave;
}
