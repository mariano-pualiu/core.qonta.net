<?php

namespace App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto;

use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte as ParteAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo opcional para expresar las partes o componentes que integran la totalidad del concepto expresado en el comprobante fiscal digital por Internet."
 */
class ParteElement extends ElementData
{
    # Elements
    protected ParteElements\InformacionAduaneraElement $InformacionAduanera;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ParteAttributes\ClaveProdServAttribute::class)]
        public ParteAttributes\ClaveProdServAttribute $ClaveProdServ,

        #[WithCastable(ParteAttributes\NoIdentificacionAttribute::class)]
        public ?ParteAttributes\NoIdentificacionAttribute $NoIdentificacion = null,

        #[WithCastable(ParteAttributes\CantidadAttribute::class)]
        public ParteAttributes\CantidadAttribute $Cantidad,

        #[WithCastable(ParteAttributes\UnidadAttribute::class)]
        public ?ParteAttributes\UnidadAttribute $Unidad = null,

        #[WithCastable(ParteAttributes\DescripcionAttribute::class)]
        public ParteAttributes\DescripcionAttribute $Descripcion,

        #[WithCastable(ParteAttributes\ValorUnitarioAttribute::class)]
        public ?ParteAttributes\ValorUnitarioAttribute $ValorUnitario = null,

        #[WithCastable(ParteAttributes\ImporteAttribute::class)]
        public ?ParteAttributes\ImporteAttribute $Importe = null
    )
    {}
}
