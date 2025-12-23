<?php

namespace App\Containers\Sat\Cfdi\Values\V33\Elements;

use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante as ComprobanteAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Estándar de Comprobante Fiscal Digital por Internet."
 */
class ComprobanteElement extends ElementData
{
    # Elements
    protected ComprobanteElements\CfdiRelacionadosElement $CfdiRelacionados;
    protected ComprobanteElements\EmisorElement $Emisor;
    protected ComprobanteElements\ReceptorElement $Receptor;
    protected ComprobanteElements\ConceptosElement $Conceptos;
    protected ComprobanteElements\ImpuestosElement $Impuestos;
    protected ComprobanteElements\ComplementoElement $Complemento;
    protected ComprobanteElements\AddendaElement $Addenda;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ComprobanteAttributes\VersionAttribute::class)]
        public ComprobanteAttributes\VersionAttribute $Version,

        #[WithCastable(ComprobanteAttributes\SerieAttribute::class)]
        public ?ComprobanteAttributes\SerieAttribute $Serie = null,

        #[WithCastable(ComprobanteAttributes\FolioAttribute::class)]
        public ?ComprobanteAttributes\FolioAttribute $Folio = null,

        #[WithCastable(ComprobanteAttributes\FechaAttribute::class)]
        public ComprobanteAttributes\FechaAttribute $Fecha,

        #[WithCastable(ComprobanteAttributes\SelloAttribute::class)]
        public ComprobanteAttributes\SelloAttribute $Sello,

        #[WithCastable(ComprobanteAttributes\FormaPagoAttribute::class)]
        public ?ComprobanteAttributes\FormaPagoAttribute $FormaPago = null,

        #[WithCastable(ComprobanteAttributes\NoCertificadoAttribute::class)]
        public ComprobanteAttributes\NoCertificadoAttribute $NoCertificado,

        #[WithCastable(ComprobanteAttributes\CertificadoAttribute::class)]
        public ComprobanteAttributes\CertificadoAttribute $Certificado,

        #[WithCastable(ComprobanteAttributes\CondicionesDePagoAttribute::class)]
        public ?ComprobanteAttributes\CondicionesDePagoAttribute $CondicionesDePago = null,

        #[WithCastable(ComprobanteAttributes\SubTotalAttribute::class)]
        public ComprobanteAttributes\SubTotalAttribute $SubTotal,

        #[WithCastable(ComprobanteAttributes\DescuentoAttribute::class)]
        public ?ComprobanteAttributes\DescuentoAttribute $Descuento = null,

        #[WithCastable(ComprobanteAttributes\MonedaAttribute::class)]
        public ComprobanteAttributes\MonedaAttribute $Moneda,

        #[WithCastable(ComprobanteAttributes\TipoCambioAttribute::class)]
        public ?ComprobanteAttributes\TipoCambioAttribute $TipoCambio = null,

        #[WithCastable(ComprobanteAttributes\TotalAttribute::class)]
        public ComprobanteAttributes\TotalAttribute $Total,

        #[WithCastable(ComprobanteAttributes\TipoDeComprobanteAttribute::class)]
        public ComprobanteAttributes\TipoDeComprobanteAttribute $TipoDeComprobante,

        #[WithCastable(ComprobanteAttributes\MetodoPagoAttribute::class)]
        public ?ComprobanteAttributes\MetodoPagoAttribute $MetodoPago = null,

        #[WithCastable(ComprobanteAttributes\LugarExpedicionAttribute::class)]
        public ComprobanteAttributes\LugarExpedicionAttribute $LugarExpedicion,

        #[WithCastable(ComprobanteAttributes\ConfirmacionAttribute::class)]
        public ?ComprobanteAttributes\ConfirmacionAttribute $Confirmacion = null
    )
    {}
}
