<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Incapacidades\IncapacidadEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el monto del importe monetario de la incapacidad."
 */
class ImporteMonetarioAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ImporteMonetario';

    const USE = UseEnum::OPTIONAL;

    const TYPE = IncapacidadEnum::ImporteMonetario;
}
