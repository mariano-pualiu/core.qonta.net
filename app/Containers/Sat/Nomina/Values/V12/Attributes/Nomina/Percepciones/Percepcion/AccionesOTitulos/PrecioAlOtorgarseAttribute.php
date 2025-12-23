<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\AccionesOTitulos;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\Percepcion\AccionesOTitulosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el precio establecido al otorgarse la opción de ingresos en acciones o títulos valor."
 */
class PrecioAlOtorgarseAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'PrecioAlOtorgarse';

    const USE = UseEnum::REQUIRED;

    const TYPE = AccionesOTitulosEnum::PrecioAlOtorgarse;
}
