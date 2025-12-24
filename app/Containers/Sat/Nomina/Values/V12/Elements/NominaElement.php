<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements;

use App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante as ComprobanteAttributes;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina as NominaAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;
use Spatie\LaravelData\Optional;

/**
 * "Complemento para incorporar al Comprobante Fiscal Digital por Internet (CFDI) la información que ampara conceptos de ingresos por salarios, la prestación de un servicio personal subordinado o conceptos asimilados a salarios (Nómina)."
 */
class NominaElement extends ElementData
{
    # Elements
    protected NominaElements\EmisorElement $Emisor;
    protected NominaElements\ReceptorElement $Receptor;
    protected NominaElements\PercepcionesElement $Percepciones;
    protected NominaElements\DeduccionesElement $Deducciones;
    protected NominaElements\OtrosPagosElement $OtrosPagos;
    protected NominaElements\IncapacidadesElement $Incapacidades;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ComprobanteAttributes\VersionAttribute::class)]
        public ComprobanteAttributes\VersionAttribute|Optional $ComprobanteVersion,

        #[WithCastable(NominaAttributes\VersionAttribute::class)]
        public NominaAttributes\VersionAttribute $Version,

        #[WithCastable(NominaAttributes\TipoNominaAttribute::class)]
        public NominaAttributes\TipoNominaAttribute $TipoNomina,

        #[WithCastable(NominaAttributes\FechaPagoAttribute::class)]
        public NominaAttributes\FechaPagoAttribute $FechaPago,

        #[WithCastable(NominaAttributes\FechaInicialPagoAttribute::class)]
        public NominaAttributes\FechaInicialPagoAttribute $FechaInicialPago,

        #[WithCastable(NominaAttributes\FechaFinalPagoAttribute::class)]
        public NominaAttributes\FechaFinalPagoAttribute $FechaFinalPago,

        #[WithCastable(NominaAttributes\NumDiasPagadosAttribute::class)]
        public NominaAttributes\NumDiasPagadosAttribute $NumDiasPagados,

        #[WithCastable(NominaAttributes\TotalPercepcionesAttribute::class)]
        public ?NominaAttributes\TotalPercepcionesAttribute $TotalPercepciones = null,

        #[WithCastable(NominaAttributes\TotalDeduccionesAttribute::class)]
        public ?NominaAttributes\TotalDeduccionesAttribute $TotalDeducciones = null,

        #[WithCastable(NominaAttributes\TotalOtrosPagosAttribute::class)]
        public ?NominaAttributes\TotalOtrosPagosAttribute $TotalOtrosPagos = null
    )
    {}
}
