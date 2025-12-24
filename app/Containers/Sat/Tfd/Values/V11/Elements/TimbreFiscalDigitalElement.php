<?php

namespace App\Containers\Sat\Tfd\Values\V11\Elements;

use App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante as ComprobanteAttributes;
use App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital as TimbreFiscalDigitalAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;
use Spatie\LaravelData\Optional;

/**
 * "Complemento requerido para el Timbrado Fiscal Digital que da validez al Comprobante fiscal digital por Internet."
 */
class TimbreFiscalDigitalElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(ComprobanteAttributes\VersionAttribute::class)]
        public ComprobanteAttributes\VersionAttribute|Optional $ComprobanteVersion,

        #[WithCastable(TimbreFiscalDigitalAttributes\VersionAttribute::class)]
        public TimbreFiscalDigitalAttributes\VersionAttribute $Version,

        #[WithCastable(TimbreFiscalDigitalAttributes\UUIDAttribute::class)]
        public TimbreFiscalDigitalAttributes\UUIDAttribute $UUID,

        #[WithCastable(TimbreFiscalDigitalAttributes\FechaTimbradoAttribute::class)]
        public TimbreFiscalDigitalAttributes\FechaTimbradoAttribute $FechaTimbrado,

        #[WithCastable(TimbreFiscalDigitalAttributes\RfcProvCertifAttribute::class)]
        public TimbreFiscalDigitalAttributes\RfcProvCertifAttribute $RfcProvCertif,

        #[WithCastable(TimbreFiscalDigitalAttributes\LeyendaAttribute::class)]
        public ?TimbreFiscalDigitalAttributes\LeyendaAttribute $Leyenda = null,

        #[WithCastable(TimbreFiscalDigitalAttributes\SelloCFDAttribute::class)]
        public TimbreFiscalDigitalAttributes\SelloCFDAttribute $SelloCFD,

        #[WithCastable(TimbreFiscalDigitalAttributes\NoCertificadoSATAttribute::class)]
        public TimbreFiscalDigitalAttributes\NoCertificadoSATAttribute $NoCertificadoSAT,

        #[WithCastable(TimbreFiscalDigitalAttributes\SelloSATAttribute::class)]
        public TimbreFiscalDigitalAttributes\SelloSATAttribute $SelloSAT
    )
    {}
}
