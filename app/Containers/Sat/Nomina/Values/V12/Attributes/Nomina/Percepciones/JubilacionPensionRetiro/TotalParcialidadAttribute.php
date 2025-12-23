<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\JubilacionPensionRetiroEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar los ingresos totales por pago cuando se hace en parcialidades."
 */
class TotalParcialidadAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TotalParcialidad';

    const USE = UseEnum::OPTIONAL;

    const TYPE = JubilacionPensionRetiroEnum::TotalParcialidad;
}
