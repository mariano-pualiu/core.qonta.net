<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para indicar si el trabajador está asociado a un sindicato. Si se omite se asume que no está asociado a algún sindicato."
 */
class SindicalizadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Sindicalizado';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::Sindicalizado;
}
