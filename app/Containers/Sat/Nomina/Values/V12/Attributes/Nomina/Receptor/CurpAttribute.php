<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la CURP del receptor del comprobante de nómina."
 */
class CurpAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Curp';

    const USE = UseEnum::REQUIRED;

    const TYPE = ReceptorEnum::Curp;
}
