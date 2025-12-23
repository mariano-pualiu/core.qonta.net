<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Parte;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\ParteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para precisar la descripción del bien o servicio cubierto por la presente parte."
 */
class DescripcionAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Descripcion';

    const USE = UseEnum::REQUIRED;

    const TYPE = ParteEnum::Descripcion;
}
