<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Parte;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte\InformacionAduanera as InformacionAduaneraAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para introducir la información aduanera aplicable cuando se trate de ventas de primera mano de mercancías importadas o se trate de operaciones de comercio exterior con bienes o servicios."
 */
class InformacionAduaneraElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(InformacionAduaneraAttributes\NumeroPedimentoAttribute::class)]
        public InformacionAduaneraAttributes\NumeroPedimentoAttribute $NumeroPedimento
    )
    {}
}
