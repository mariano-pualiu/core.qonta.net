<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Receptor;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para registrar la clave del país de residencia para efectos fiscales del receptor del comprobante, cuando se trate de un extranjero, y que es conforme con la especificación ISO 3166-1 alpha-3. Es requerido cuando se incluya el complemento de comercio exterior o se registre el atributo NumRegIdTrib."
 */
class ResidenciaFiscalAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'ResidenciaFiscal';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::ResidenciaFiscal;
}
