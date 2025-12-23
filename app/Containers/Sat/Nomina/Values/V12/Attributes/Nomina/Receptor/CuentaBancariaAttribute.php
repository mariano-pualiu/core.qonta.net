<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para la expresión de la cuenta bancaria a 11 posiciones o número de teléfono celular a 10 posiciones o número de tarjeta de crédito, débito o servicios a 15 ó 16 posiciones o la CLABE a 18 posiciones o número de monedero electrónico, donde se realiza el depósito de nómina."
 */
class CuentaBancariaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'CuentaBancaria';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::CuentaBancaria;
}
