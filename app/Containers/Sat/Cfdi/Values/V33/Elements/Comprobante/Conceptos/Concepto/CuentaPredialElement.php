<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\CuentaPredial as CuentaPredialAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para asentar el número de cuenta predial con el que fue registrado el inmueble, en el sistema catastral de la entidad federativa de que trate, o bien para incorporar los datos de identificación del certificado de participación inmobiliaria no amortizable."
 */
class CuentaPredialElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(CuentaPredialAttributes\NumeroAttribute::class)]
        public CuentaPredialAttributes\NumeroAttribute $Numero
    )
    {}
}
