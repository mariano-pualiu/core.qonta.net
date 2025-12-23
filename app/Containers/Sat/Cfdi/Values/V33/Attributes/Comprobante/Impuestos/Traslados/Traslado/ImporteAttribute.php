<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la suma del importe del impuesto trasladado, agrupado por impuesto, TipoFactor y TasaOCuota. No se permiten valores negativos."
 */
class ImporteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Importe';

    const USE = UseEnum::REQUIRED;

    const TYPE = TrasladoEnum::Importe;
}
