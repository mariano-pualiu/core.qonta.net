<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro as JubilacionPensionRetiroAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar la información detallada de pagos por jubilación, pensiones o haberes de retiro."
 */
class JubilacionPensionRetiroElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(JubilacionPensionRetiroAttributes\TotalUnaExhibicionAttribute::class)]
        public ?JubilacionPensionRetiroAttributes\TotalUnaExhibicionAttribute $TotalUnaExhibicion = null,

        #[WithCastable(JubilacionPensionRetiroAttributes\TotalParcialidadAttribute::class)]
        public ?JubilacionPensionRetiroAttributes\TotalParcialidadAttribute $TotalParcialidad = null,

        #[WithCastable(JubilacionPensionRetiroAttributes\MontoDiarioAttribute::class)]
        public ?JubilacionPensionRetiroAttributes\MontoDiarioAttribute $MontoDiario = null,

        #[WithCastable(JubilacionPensionRetiroAttributes\IngresoAcumulableAttribute::class)]
        public JubilacionPensionRetiroAttributes\IngresoAcumulableAttribute $IngresoAcumulable,

        #[WithCastable(JubilacionPensionRetiroAttributes\IngresoNoAcumulableAttribute::class)]
        public JubilacionPensionRetiroAttributes\IngresoNoAcumulableAttribute $IngresoNoAcumulable
    )
    {}
}
