<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPagoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el importe del concepto de otro pago."
 */
class ImporteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Importe';

    const USE = UseEnum::REQUIRED;

    const TYPE = OtroPagoEnum::Importe;
}
