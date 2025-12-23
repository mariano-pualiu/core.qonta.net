<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor\EntidadSNCF;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\Emisor\EntidadSNCFEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para identificar el origen del recurso utilizado para el pago de nómina del personal que presta o desempeña un servicio personal subordinado o asimilado a salarios en las dependencias."
 */
class OrigenRecursoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'OrigenRecurso';

    const USE = UseEnum::REQUIRED;

    const TYPE = EntidadSNCFEnum::OrigenRecurso;
}
