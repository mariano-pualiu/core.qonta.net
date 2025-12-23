<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\Retencion;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\RetencionEnum;
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

    const TYPE = RetencionEnum::TipoFactor;
}
