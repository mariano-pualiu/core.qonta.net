<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\Percepcion;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\HorasExtra as HorasExtraAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar las horas extra aplicables."
 */
class HorasExtraElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(HorasExtraAttributes\DiasAttribute::class)]
        public HorasExtraAttributes\DiasAttribute $Dias,

        #[WithCastable(HorasExtraAttributes\TipoHorasAttribute::class)]
        public HorasExtraAttributes\TipoHorasAttribute $TipoHoras,

        #[WithCastable(HorasExtraAttributes\HorasExtraAttribute::class)]
        public HorasExtraAttributes\HorasExtraAttribute $HorasExtra,

        #[WithCastable(HorasExtraAttributes\ImportePagadoAttribute::class)]
        public HorasExtraAttributes\ImportePagadoAttribute $ImportePagado
    )
    {}
}
