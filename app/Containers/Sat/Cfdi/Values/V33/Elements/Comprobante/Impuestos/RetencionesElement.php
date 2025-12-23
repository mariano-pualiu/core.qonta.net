<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos\Retenciones as RetencionesAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para capturar los impuestos retenidos aplicables. Es requerido cuando en los conceptos se registre algún impuesto retenido."
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
