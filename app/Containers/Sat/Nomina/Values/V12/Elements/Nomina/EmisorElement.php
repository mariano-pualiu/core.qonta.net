<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor as EmisorAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para expresar la información del contribuyente emisor del comprobante de nómina."
 */
class EmisorElement extends ElementData
{
    # Elements
    protected EmisorElements\EntidadSNCFElement $EntidadSNCF;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(EmisorAttributes\CurpAttribute::class)]
        public ?EmisorAttributes\CurpAttribute $Curp = null,

        #[WithCastable(EmisorAttributes\RegistroPatronalAttribute::class)]
        public ?EmisorAttributes\RegistroPatronalAttribute $RegistroPatronal = null,

        #[WithCastable(EmisorAttributes\RfcPatronOrigenAttribute::class)]
        public ?EmisorAttributes\RfcPatronOrigenAttribute $RfcPatronOrigen = null
    )
    {}
}
