<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido que sirve para incorporar el certificado de sello digital que ampara al comprobante, como texto en formato base 64."
 */
class CertificadoAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Certificado';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::Certificado;
}
