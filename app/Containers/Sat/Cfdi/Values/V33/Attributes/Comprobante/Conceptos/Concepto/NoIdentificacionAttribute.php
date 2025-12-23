<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\ConceptoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para expresar el número de parte, identificador del producto o del servicio, la clave de producto o servicio, SKU o equivalente, propia de la operación del emisor, amparado por el presente concepto. Opcionalmente se puede utilizar claves del estándar GTIN."
 */
class NoIdentificacionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NoIdentificacion';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ConceptoEnum::NoIdentificacion;
}
