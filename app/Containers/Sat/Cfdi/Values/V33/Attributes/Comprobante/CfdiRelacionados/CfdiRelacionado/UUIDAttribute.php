<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\CfdiRelacionados\CfdiRelacionado;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\CfdiRelacionados\CfdiRelacionadoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para registrar el folio fiscal (UUID) de un CFDI relacionado con el presente comprobante, por ejemplo: Si el CFDI relacionado es un comprobante de traslado que sirve para registrar el movimiento de la mercancía. Si este comprobante se usa como nota de crédito o nota de débito del comprobante relacionado. Si este comprobante es una devolución sobre el comprobante relacionado. Si éste sustituye a una factura cancelada."
 */
class UUIDAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'UUID';

    const USE = UseEnum::REQUIRED;

    const TYPE = CfdiRelacionadoEnum::UUID;
}
