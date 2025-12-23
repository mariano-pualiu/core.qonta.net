<?php

namespace App\Containers\Sat\Tfd\Enums\V11;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum TimbreFiscalDigitalEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Version                              = 'Version';
    case UUID                                 = 'UUID';
    case FechaTimbrado                        = 'FechaTimbrado';
    case RfcProvCertif                        = 'RfcProvCertif';
    case Leyenda                              = 'Leyenda';
    case SelloCFD                             = 'SelloCFD';
    case NoCertificadoSAT                     = 'NoCertificadoSAT';
    case SelloSAT                             = 'SelloSAT';

    public function annotation(): string
    {
        return match($this)
        {
            TimbreFiscalDigitalEnum::Version          => 'Atributo requerido para la expresión de la versión del estándar del Timbre Fiscal Digital',
            TimbreFiscalDigitalEnum::UUID             => 'Atributo requerido para expresar los 36 caracteres del folio fiscal (UUID) de la transacción de timbrado conforme al estándar RFC 4122',
            TimbreFiscalDigitalEnum::FechaTimbrado    => 'Atributo requerido para expresar la fecha y hora, de la generación del timbre por la certificación digital del SAT. Se expresa en la forma AAAA-MM-DDThh:mm:ss y debe corresponder con la hora de la Zona Centro del Sistema de Horario en México.',
            TimbreFiscalDigitalEnum::RfcProvCertif    => 'Atributo requerido para expresar el RFC del proveedor de certificación de comprobantes fiscales digitales que genera el timbre fiscal digital.',
            TimbreFiscalDigitalEnum::Leyenda          => 'Atributo opcional para registrar información que el SAT comunique a los usuarios del CFDI.',
            TimbreFiscalDigitalEnum::SelloCFD         => 'Atributo requerido para contener el sello digital del comprobante fiscal o del comprobante de retenciones, que se ha timbrado. El sello debe ser expresado como una cadena de texto en formato Base 64.',
            TimbreFiscalDigitalEnum::NoCertificadoSAT => 'Atributo requerido para expresar el número de serie del certificado del SAT usado para generar el sello digital del Timbre Fiscal Digital.',
            TimbreFiscalDigitalEnum::SelloSAT         => 'Atributo requerido para contener el sello digital del Timbre Fiscal Digital, al que hacen referencia las reglas de la Resolución Miscelánea vigente. El sello debe ser expresado como una cadena de texto en formato Base 64.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            TimbreFiscalDigitalEnum::Version          => BaseEnum::XS_STRING,
            TimbreFiscalDigitalEnum::UUID             => BaseEnum::XS_STRING,
            TimbreFiscalDigitalEnum::FechaTimbrado    => Types\TdCFDIEnum::T_FechaH->base(),
            TimbreFiscalDigitalEnum::RfcProvCertif    => Types\TdCFDIEnum::T_RFC_PM->base(),
            TimbreFiscalDigitalEnum::Leyenda          => BaseEnum::XS_STRING,
            TimbreFiscalDigitalEnum::SelloCFD         => BaseEnum::XS_STRING,
            TimbreFiscalDigitalEnum::NoCertificadoSAT => BaseEnum::XS_STRING,
            TimbreFiscalDigitalEnum::SelloSAT         => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            TimbreFiscalDigitalEnum::Version          => [
                
            ],
            TimbreFiscalDigitalEnum::UUID             => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\LengthRule::class => new CommonRules\LengthRule('36'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[a-f0-9A-F]{8}-[a-f0-9A-F]{4}-[a-f0-9A-F]{4}-[a-f0-9A-F]{4}-[a-f0-9A-F]{12}'),
            ],
            TimbreFiscalDigitalEnum::FechaTimbrado    => Types\TdCFDIEnum::T_FechaH->restrictionRules(),
            TimbreFiscalDigitalEnum::RfcProvCertif    => Types\TdCFDIEnum::T_RFC_PM->restrictionRules(),
            TimbreFiscalDigitalEnum::Leyenda          => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('12'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('150'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('([A-Z]|[a-z]|[0-9]| |Ñ|ñ|!|"|%|&|'|´|-|:|;|>|=|<|@|_|,|\{|\}|`|~|á|é|í|ó|ú|Á|É|Í|Ó|Ú|ü|Ü){1,150}'),
            ],
            TimbreFiscalDigitalEnum::SelloCFD         => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            TimbreFiscalDigitalEnum::NoCertificadoSAT => [
                CommonRules\LengthRule::class => new CommonRules\LengthRule('20'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{20}'),
            ],
            TimbreFiscalDigitalEnum::SelloSAT         => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
        };
    }
}
