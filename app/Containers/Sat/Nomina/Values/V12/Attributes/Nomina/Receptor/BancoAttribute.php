<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para la expresión de la clave del Banco conforme al catálogo, donde se realiza el depósito de nómina."
 */
class BancoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Banco';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::Banco;
}
