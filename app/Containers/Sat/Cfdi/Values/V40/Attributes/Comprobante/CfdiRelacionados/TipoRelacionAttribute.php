<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\CfdiRelacionados;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\CfdiRelacionadosEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para indicar la clave de la relación que existe entre éste que se está generando y el o los CFDI previos."
 */
class TipoRelacionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoRelacion';

    const USE = UseEnum::REQUIRED;

    const TYPE = CfdiRelacionadosEnum::TipoRelacion;
}
