<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la suma de los atributos Base de los conceptos del impuesto trasladado. No se permiten valores negativos."
 */
class BaseAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Base';

    const USE = UseEnum::REQUIRED;

    const TYPE = TrasladoEnum::Base;
}
