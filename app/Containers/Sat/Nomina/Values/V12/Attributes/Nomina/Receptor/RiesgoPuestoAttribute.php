<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para expresar la clave conforme a la Clase en que deben inscribirse los patrones, de acuerdo con las actividades que desempeñan sus trabajadores, según lo previsto en el artículo 196 del Reglamento en Materia de Afiliación Clasificación de Empresas, Recaudación y Fiscalización, o conforme con la normatividad del Instituto de Seguridad Social del trabajador.  Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales."
 */
class RiesgoPuestoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'RiesgoPuesto';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::RiesgoPuesto;
}
