<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\Impuestos;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones as RetencionesAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para asentar los impuestos retenidos aplicables al presente concepto."
 */
class RetencionesElement extends ElementData
{
    # Elements
    protected RetencionesElements\RetencionElement $Retencion;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
