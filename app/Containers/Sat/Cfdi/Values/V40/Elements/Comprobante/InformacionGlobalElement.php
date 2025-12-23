<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\InformacionGlobal as InformacionGlobalAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para precisar la información relacionada con el comprobante global."
 */
class InformacionGlobalElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(InformacionGlobalAttributes\PeriodicidadAttribute::class)]
        public InformacionGlobalAttributes\PeriodicidadAttribute $Periodicidad,

        #[WithCastable(InformacionGlobalAttributes\MesesAttribute::class)]
        public InformacionGlobalAttributes\MesesAttribute $Meses,

        #[WithCastable(InformacionGlobalAttributes\AñoAttribute::class)]
        public InformacionGlobalAttributes\AñoAttribute $Año
    )
    {}
}
