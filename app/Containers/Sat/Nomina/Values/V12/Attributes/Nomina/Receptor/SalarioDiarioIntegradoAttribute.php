<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para expresar el salario que se integra con los pagos hechos en efectivo por cuota diaria, gratificaciones, percepciones, habitación, primas, comisiones, prestaciones en especie y cualquier otra cantidad o prestación que se entregue al trabajador por su trabajo, de conformidad con el Art. 84 de la Ley Federal del Trabajo. (Se utiliza para el cálculo de las indemnizaciones). Se debe ingresar cuando se esté obligado conforme a otras disposiciones distintas a las fiscales."
 */
class SalarioDiarioIntegradoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'SalarioDiarioIntegrado';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::SalarioDiarioIntegrado;
}
