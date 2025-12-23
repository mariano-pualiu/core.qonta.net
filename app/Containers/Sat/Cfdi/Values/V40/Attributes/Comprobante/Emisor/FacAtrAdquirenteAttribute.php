<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Emisor;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\EmisorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo condicional para expresar el número de operación proporcionado por el SAT cuando se trate de un comprobante a través de un PCECFDI o un PCGCFDISP."
 */
class FacAtrAdquirenteAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'FacAtrAdquirente';

    const USE = UseEnum::OPTIONAL;

    const TYPE = EmisorEnum::FacAtrAdquirente;
}
