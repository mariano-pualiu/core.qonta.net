<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\Retencion;

use App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\RetencionEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para señalar la base para el cálculo de la retención, la determinación de la base se realiza de acuerdo con las disposiciones fiscales vigentes. No se permiten valores negativos."
 */
class BaseAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Base';

    const USE = UseEnum::REQUIRED;

    const TYPE = RetencionEnum::Base;
}
