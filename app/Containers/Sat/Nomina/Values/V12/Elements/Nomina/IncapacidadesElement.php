<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades as IncapacidadesAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar información de las incapacidades."
 */
class IncapacidadesElement extends ElementData
{
    # Elements
    protected IncapacidadesElements\IncapacidadElement $Incapacidad;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
    )
    {}
}
