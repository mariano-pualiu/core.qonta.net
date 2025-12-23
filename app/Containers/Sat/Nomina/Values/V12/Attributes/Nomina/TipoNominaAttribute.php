<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina;

use App\Containers\Sat\Nomina\Enums\V12\NominaEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para indicar el tipo de nómina, puede ser O= Nómina ordinaria o E= Nómina extraordinaria."
 */
class TipoNominaAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoNomina';

    const USE = UseEnum::REQUIRED;

    const TYPE = NominaEnum::TipoNomina;
}
