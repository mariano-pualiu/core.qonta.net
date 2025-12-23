<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante;

use App\Containers\Sat\Cfdi\Enums\V33\ComprobanteEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo requerido para representar la suma del subtotal, menos los descuentos aplicables, más las contribuciones recibidas (impuestos trasladados - federales o locales, derechos, productos, aprovechamientos, aportaciones de seguridad social, contribuciones de mejoras) menos los impuestos retenidos. Si el valor es superior al límite que establezca el SAT en la Resolución Miscelánea Fiscal vigente, el emisor debe obtener del PAC que vaya a timbrar el CFDI, de manera no automática, una clave de confirmación para ratificar que el valor es correcto e integrar dicha clave en el atributo Confirmacion. No se permiten valores negativos."
 */
class TotalAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'Total';

    const USE = UseEnum::REQUIRED;

    const TYPE = ComprobanteEnum::Total;
}
