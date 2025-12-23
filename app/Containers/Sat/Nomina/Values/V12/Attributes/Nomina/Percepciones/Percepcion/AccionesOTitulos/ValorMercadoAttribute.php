<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\AccionesOTitulos;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\Percepcion\AccionesOTitulosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el valor de mercado de las Acciones o Títulos valor al ejercer la opción."
 */
class ValorMercadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ValorMercado';

    const USE = UseEnum::REQUIRED;

    const TYPE = AccionesOTitulosEnum::ValorMercado;
}
