<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para registrar información que el SAT comunique a los usuarios del CFDI."
 */
class LeyendaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Leyenda';

    const USE = UseEnum::OPTIONAL;

    const TYPE = TimbreFiscalDigitalEnum::Leyenda;
}
