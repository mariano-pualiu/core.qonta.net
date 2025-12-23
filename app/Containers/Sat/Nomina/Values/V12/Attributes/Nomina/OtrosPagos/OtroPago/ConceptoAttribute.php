<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPagoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para la descripción del concepto de otro pago."
 */
class ConceptoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Concepto';

    const USE = UseEnum::REQUIRED;

    const TYPE = OtroPagoEnum::Concepto;
}
