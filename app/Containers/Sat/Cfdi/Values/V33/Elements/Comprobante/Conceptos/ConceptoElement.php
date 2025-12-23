<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto as ConceptoAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para registrar la información detallada de un bien o servicio amparado en el comprobante."
 */
class ConceptoElement extends ElementData
{
    # Elements
    protected ConceptoElements\ImpuestosElement $Impuestos;
    protected ConceptoElements\InformacionAduaneraElement $InformacionAduanera;
    protected ConceptoElements\CuentaPredialElement $CuentaPredial;
    protected ConceptoElements\ComplementoConceptoElement $ComplementoConcepto;
    protected ConceptoElements\ParteElement $Parte;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ConceptoAttributes\ClaveProdServAttribute::class)]
        public ConceptoAttributes\ClaveProdServAttribute $ClaveProdServ,

        #[WithCastable(ConceptoAttributes\NoIdentificacionAttribute::class)]
        public ?ConceptoAttributes\NoIdentificacionAttribute $NoIdentificacion = null,

        #[WithCastable(ConceptoAttributes\CantidadAttribute::class)]
        public ConceptoAttributes\CantidadAttribute $Cantidad,

        #[WithCastable(ConceptoAttributes\ClaveUnidadAttribute::class)]
        public ConceptoAttributes\ClaveUnidadAttribute $ClaveUnidad,

        #[WithCastable(ConceptoAttributes\UnidadAttribute::class)]
        public ?ConceptoAttributes\UnidadAttribute $Unidad = null,

        #[WithCastable(ConceptoAttributes\DescripcionAttribute::class)]
        public ConceptoAttributes\DescripcionAttribute $Descripcion,

        #[WithCastable(ConceptoAttributes\ValorUnitarioAttribute::class)]
        public ConceptoAttributes\ValorUnitarioAttribute $ValorUnitario,

        #[WithCastable(ConceptoAttributes\ImporteAttribute::class)]
        public ConceptoAttributes\ImporteAttribute $Importe,

        #[WithCastable(ConceptoAttributes\DescuentoAttribute::class)]
        public ?ConceptoAttributes\DescuentoAttribute $Descuento = null
    )
    {}
}
