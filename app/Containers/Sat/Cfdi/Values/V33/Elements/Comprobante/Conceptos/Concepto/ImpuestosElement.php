<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos as ImpuestosAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para capturar los impuestos aplicables al presente concepto. Cuando un concepto no registra un impuesto, implica que no es objeto del mismo."
 */
class ImpuestosElement extends ElementData
{
    # Elements
    protected ImpuestosElements\TrasladosElement $Traslados;
    protected ImpuestosElements\RetencionesElement $Retenciones;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
