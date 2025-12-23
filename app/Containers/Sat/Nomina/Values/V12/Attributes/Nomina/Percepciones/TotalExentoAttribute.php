<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\PercepcionesEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el total de percepciones exentas que se relacionan en el comprobante."
 */
class TotalExentoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalExento';

    const USE = UseEnum::REQUIRED;

    const TYPE = PercepcionesEnum::TotalExento;
}
