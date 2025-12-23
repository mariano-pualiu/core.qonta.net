<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Retenciones\Retencion;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Impuestos\Retenciones\RetencionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la clave del tipo de impuesto retenido."
 */
class ImpuestoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Impuesto';

    const USE = UseEnum::REQUIRED;

    const TYPE = RetencionEnum::Impuesto;
}
