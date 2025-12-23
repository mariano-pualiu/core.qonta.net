<?php

namespace App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital;

use App\Containers\Sat\Tfd\Enums\V11\TimbreFiscalDigitalEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar la fecha y hora, de la generación del timbre por la certificación digital del SAT. Se expresa en la forma AAAA-MM-DDThh:mm:ss y debe corresponder con la hora de la Zona Centro del Sistema de Horario en México."
 */
class FechaTimbradoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'FechaTimbrado';

    const USE = UseEnum::REQUIRED;

    const TYPE = TimbreFiscalDigitalEnum::FechaTimbrado;
}
