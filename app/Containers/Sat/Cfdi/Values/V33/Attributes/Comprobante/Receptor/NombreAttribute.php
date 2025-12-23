<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para precisar el nombre, denominación o razón social del contribuyente receptor del comprobante."
 */
class NombreAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Nombre';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::Nombre;
}
