<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el RFC del proveedor de certificación de comprobantes fiscales digitales que genera el timbre fiscal digital."
 */
class RfcProvCertifAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RfcProvCertif';

    const USE = UseEnum::REQUIRED;

    const TYPE = TimbreFiscalDigitalEnum::RfcProvCertif;
}
