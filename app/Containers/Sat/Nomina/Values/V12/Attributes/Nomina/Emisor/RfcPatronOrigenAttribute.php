<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para expresar el RFC de la persona que fungió como patrón cuando el pago al trabajador se realice a través de un tercero como vehículo o herramienta de pago."
 */
class RfcPatronOrigenAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RfcPatronOrigen';

    const USE = UseEnum::OPTIONAL;

    const TYPE = EmisorEnum::RfcPatronOrigen;
}
