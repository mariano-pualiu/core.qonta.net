<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleo;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el subsidio causado conforme a la tabla del subsidio para el empleo publicada en el Anexo 8 de la RMF vigente."
 */
class SubsidioCausadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'SubsidioCausado';

    const USE = UseEnum::REQUIRED;

    const TYPE = SubsidioAlEmpleoEnum::SubsidioCausado;
}
