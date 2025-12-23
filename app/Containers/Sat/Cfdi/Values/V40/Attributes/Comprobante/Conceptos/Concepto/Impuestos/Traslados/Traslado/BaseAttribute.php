<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado;

use App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\Impuestos\Traslados\TrasladoEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la base para el cálculo del impuesto, la determinación de la base se realiza de acuerdo con las disposiciones fiscales vigentes. No se permiten valores negativos."
 */
class BaseAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Base';

    const USE = UseEnum::REQUIRED;

    const TYPE = TrasladoEnum::Base;
}
