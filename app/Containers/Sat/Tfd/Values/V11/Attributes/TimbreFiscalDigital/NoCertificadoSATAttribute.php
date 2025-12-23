<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el número de serie del certificado del SAT usado para generar el sello digital del Timbre Fiscal Digital."
 */
class NoCertificadoSATAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NoCertificadoSAT';

    const USE = UseEnum::REQUIRED;

    const TYPE = TimbreFiscalDigitalEnum::NoCertificadoSAT;
}
