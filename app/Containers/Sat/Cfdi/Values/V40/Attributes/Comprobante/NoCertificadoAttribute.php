<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para expresar el número de serie del certificado de sello digital que ampara al comprobante, de acuerdo con el acuse correspondiente a 20 posiciones otorgado por el sistema del SAT."
 */
class NoCertificadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'NoCertificado';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::NoCertificado;
}
