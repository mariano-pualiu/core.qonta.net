<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para contener el sello digital del Timbre Fiscal Digital, al que hacen referencia las reglas de la Resolución Miscelánea vigente. El sello debe ser expresado como una cadena de texto en formato Base 64."
 */
class SelloSATAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'SelloSAT';

    const USE = UseEnum::REQUIRED;

    const TYPE = TimbreFiscalDigitalEnum::SelloSAT;
}
