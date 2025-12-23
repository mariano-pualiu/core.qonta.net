<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Retenciones\Retencion;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Impuestos\Retenciones\RetencionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar el monto del impuesto retenido. No se permiten valores negativos."
 */
class ImporteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Importe';

    const USE = UseEnum::REQUIRED;

    const TYPE = RetencionEnum::Importe;
}
