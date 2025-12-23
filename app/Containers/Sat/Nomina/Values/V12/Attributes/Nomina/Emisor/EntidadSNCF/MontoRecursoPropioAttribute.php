<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor\EntidadSNCF;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Emisor\EntidadSNCFEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el monto del recurso pagado con cargo a sus participaciones u otros ingresos locales (importe bruto de los ingresos propios, es decir total de gravados y exentos), cuando el origen es mixto."
 */
class MontoRecursoPropioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'MontoRecursoPropio';

    const USE = UseEnum::OPTIONAL;

    const TYPE = EntidadSNCFEnum::MontoRecursoPropio;
}
