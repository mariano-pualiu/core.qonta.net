<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el número de registro de identidad fiscal del receptor cuando sea residente en el  extranjero. Es requerido cuando se incluya el complemento de comercio exterior."
 */
class NumRegIdTribAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NumRegIdTrib';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::NumRegIdTrib;
}
