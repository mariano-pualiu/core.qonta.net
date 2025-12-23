<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la clave del tipo de factor que se aplica a la base del impuesto."
 */
class TipoFactorAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'TipoFactor';

    const USE = UseEnum::REQUIRED;

    const TYPE = TrasladoEnum::TipoFactor;
}
