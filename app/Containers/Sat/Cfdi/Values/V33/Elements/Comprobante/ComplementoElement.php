<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Complemento as ComplementoAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;
use App\Containers\Sat\Nomina\Values\Common\Attributes\Nomina as NominaAttributes;
use App\Containers\Sat\Tfd\Values\Common\Attributes\TimbreFiscalDigital as TimbreFiscalDigitalAttributes;

/**
 * "Nodo opcional donde se incluye el complemento Timbre Fiscal Digital de manera obligatoria y los nodos complementarios determinados por el SAT, de acuerdo con las disposiciones particulares para un sector o actividad específica."
 */
class ComplementoElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(NominaAttributes\VersionAttribute::class)]
        public NominaAttributes\VersionAttribute $NominaVersion,

        #[WithCastable(TimbreFiscalDigitalAttributes\VersionAttribute::class)]
        public TimbreFiscalDigitalAttributes\VersionAttribute $TimbreFiscalDigitalVersion
    )
    {}
}
