<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor as ReceptorAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo requerido para precisar la información del contribuyente receptor del comprobante de nómina."
 */
class ReceptorElement extends ElementData
{
    # Elements
    protected ReceptorElements\SubContratacionElement $SubContratacion;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ReceptorAttributes\CurpAttribute::class)]
        public ReceptorAttributes\CurpAttribute $Curp,

        #[WithCastable(ReceptorAttributes\NumSeguridadSocialAttribute::class)]
        public ?ReceptorAttributes\NumSeguridadSocialAttribute $NumSeguridadSocial = null,

        #[WithCastable(ReceptorAttributes\FechaInicioRelLaboralAttribute::class)]
        public ?ReceptorAttributes\FechaInicioRelLaboralAttribute $FechaInicioRelLaboral = null,

        #[WithCastable(ReceptorAttributes\AntigüedadAttribute::class)]
        public ?ReceptorAttributes\AntigüedadAttribute $Antigüedad = null,

        #[WithCastable(ReceptorAttributes\TipoContratoAttribute::class)]
        public ReceptorAttributes\TipoContratoAttribute $TipoContrato,

        #[WithCastable(ReceptorAttributes\SindicalizadoAttribute::class)]
        public ?ReceptorAttributes\SindicalizadoAttribute $Sindicalizado = null,

        #[WithCastable(ReceptorAttributes\TipoJornadaAttribute::class)]
        public ?ReceptorAttributes\TipoJornadaAttribute $TipoJornada = null,

        #[WithCastable(ReceptorAttributes\TipoRegimenAttribute::class)]
        public ReceptorAttributes\TipoRegimenAttribute $TipoRegimen,

        #[WithCastable(ReceptorAttributes\NumEmpleadoAttribute::class)]
        public ReceptorAttributes\NumEmpleadoAttribute $NumEmpleado,

        #[WithCastable(ReceptorAttributes\DepartamentoAttribute::class)]
        public ?ReceptorAttributes\DepartamentoAttribute $Departamento = null,

        #[WithCastable(ReceptorAttributes\PuestoAttribute::class)]
        public ?ReceptorAttributes\PuestoAttribute $Puesto = null,

        #[WithCastable(ReceptorAttributes\RiesgoPuestoAttribute::class)]
        public ?ReceptorAttributes\RiesgoPuestoAttribute $RiesgoPuesto = null,

        #[WithCastable(ReceptorAttributes\PeriodicidadPagoAttribute::class)]
        public ReceptorAttributes\PeriodicidadPagoAttribute $PeriodicidadPago,

        #[WithCastable(ReceptorAttributes\BancoAttribute::class)]
        public ?ReceptorAttributes\BancoAttribute $Banco = null,

        #[WithCastable(ReceptorAttributes\CuentaBancariaAttribute::class)]
        public ?ReceptorAttributes\CuentaBancariaAttribute $CuentaBancaria = null,

        #[WithCastable(ReceptorAttributes\SalarioBaseCotAporAttribute::class)]
        public ?ReceptorAttributes\SalarioBaseCotAporAttribute $SalarioBaseCotApor = null,

        #[WithCastable(ReceptorAttributes\SalarioDiarioIntegradoAttribute::class)]
        public ?ReceptorAttributes\SalarioDiarioIntegradoAttribute $SalarioDiarioIntegrado = null,

        #[WithCastable(ReceptorAttributes\ClaveEntFedAttribute::class)]
        public ReceptorAttributes\ClaveEntFedAttribute $ClaveEntFed
    )
    {}
}
