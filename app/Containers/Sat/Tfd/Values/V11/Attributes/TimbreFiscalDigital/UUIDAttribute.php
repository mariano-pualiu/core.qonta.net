<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar los 36 caracteres del folio fiscal (UUID) de la transacción de timbrado conforme al estándar RFC 4122"
 */
class UUIDAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'UUID';

    const USE = UseEnum::REQUIRED;

    const TYPE = TimbreFiscalDigitalEnum::UUID;
}
