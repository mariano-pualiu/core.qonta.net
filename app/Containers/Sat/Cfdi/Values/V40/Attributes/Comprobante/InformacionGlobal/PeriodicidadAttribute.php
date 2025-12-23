<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\InformacionGlobal;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\InformacionGlobalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el período al que corresponde la información del comprobante global."
 */
class PeriodicidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Periodicidad';

    const USE = UseEnum::REQUIRED;

    const TYPE = InformacionGlobalEnum::Periodicidad;
}
