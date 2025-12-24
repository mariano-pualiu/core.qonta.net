<?php

namespace App\Containers\Sat\Cfdi\Enums\V40;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum ComprobanteEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Version                       = 'Version';
    case Serie                         = 'Serie';
    case Folio                         = 'Folio';
    case Fecha                         = 'Fecha';
    case Sello                         = 'Sello';
    case FormaPago                     = 'FormaPago';
    case NoCertificado                 = 'NoCertificado';
    case Certificado                   = 'Certificado';
    case CondicionesDePago             = 'CondicionesDePago';
    case SubTotal                      = 'SubTotal';
    case Descuento                     = 'Descuento';
    case Moneda                        = 'Moneda';
    case TipoCambio                    = 'TipoCambio';
    case Total                         = 'Total';
    case TipoDeComprobante             = 'TipoDeComprobante';
    case Exportacion                   = 'Exportacion';
    case MetodoPago                    = 'MetodoPago';
    case LugarExpedicion               = 'LugarExpedicion';
    case Confirmacion                  = 'Confirmacion';

    public function annotation(): string
    {
        return match($this)
        {
            ComprobanteEnum::Version           => 'Atributo requerido con valor prefijado a 4.0 que indica la versión del estándar bajo el que se encuentra expresado el comprobante.',
            ComprobanteEnum::Serie             => 'Atributo opcional para precisar la serie para control interno del contribuyente. Este atributo acepta una cadena de caracteres.',
            ComprobanteEnum::Folio             => 'Atributo opcional para control interno del contribuyente que expresa el folio del comprobante, acepta una cadena de caracteres.',
            ComprobanteEnum::Fecha             => 'Atributo requerido para la expresión de la fecha y hora de expedición del Comprobante Fiscal Digital por Internet. Se expresa en la forma AAAA-MM-DDThh:mm:ss y debe corresponder con la hora local donde se expide el comprobante.',
            ComprobanteEnum::Sello             => 'Atributo requerido para contener el sello digital del comprobante fiscal, al que hacen referencia las reglas de resolución miscelánea vigente. El sello debe ser expresado como una cadena de texto en formato Base 64.',
            ComprobanteEnum::FormaPago         => 'Atributo condicional para expresar la clave de la forma de pago de los bienes o servicios amparados por el comprobante.',
            ComprobanteEnum::NoCertificado     => 'Atributo requerido para expresar el número de serie del certificado de sello digital que ampara al comprobante, de acuerdo con el acuse correspondiente a 20 posiciones otorgado por el sistema del SAT.',
            ComprobanteEnum::Certificado       => 'Atributo requerido que sirve para incorporar el certificado de sello digital que ampara al comprobante, como texto en formato base 64.',
            ComprobanteEnum::CondicionesDePago => 'Atributo condicional para expresar las condiciones comerciales aplicables para el pago del comprobante fiscal digital por Internet. Este atributo puede ser condicionado mediante atributos o complementos.',
            ComprobanteEnum::SubTotal          => 'Atributo requerido para representar la suma de los importes de los conceptos antes de descuentos e impuesto. No se permiten valores negativos.',
            ComprobanteEnum::Descuento         => 'Atributo condicional para representar el importe total de los descuentos aplicables antes de impuestos. No se permiten valores negativos. Se debe registrar cuando existan conceptos con descuento.',
            ComprobanteEnum::Moneda            => 'Atributo requerido para identificar la clave de la moneda utilizada para expresar los montos, cuando se usa moneda nacional se registra MXN. Conforme con la especificación ISO 4217.',
            ComprobanteEnum::TipoCambio        => 'Atributo condicional para representar el tipo de cambio FIX conforme con la moneda usada. Es requerido cuando la clave de moneda es distinta de MXN y de XXX. El valor debe reflejar el número de pesos mexicanos que equivalen a una unidad de la divisa señalada en el atributo moneda. Si el valor está fuera del porcentaje aplicable a la moneda tomado del catálogo c_Moneda, el emisor debe obtener del PAC que vaya a timbrar el CFDI, de manera no automática, una clave de confirmación para ratificar que el valor es correcto e integrar dicha clave en el atributo Confirmacion.',
            ComprobanteEnum::Total             => 'Atributo requerido para representar la suma del subtotal, menos los descuentos aplicables, más las contribuciones recibidas (impuestos trasladados - federales y/o locales, derechos, productos, aprovechamientos, aportaciones de seguridad social, contribuciones de mejoras) menos los impuestos retenidos federales y/o locales. Si el valor es superior al límite que establezca el SAT en la Resolución Miscelánea Fiscal vigente, el emisor debe obtener del PAC que vaya a timbrar el CFDI, de manera no automática, una clave de confirmación para ratificar que el valor es correcto e integrar dicha clave en el atributo Confirmacion. No se permiten valores negativos. ',
            ComprobanteEnum::TipoDeComprobante => 'Atributo requerido para expresar la clave del efecto del comprobante fiscal para el contribuyente emisor.',
            ComprobanteEnum::Exportacion       => 'Atributo requerido para expresar si el comprobante ampara una operación de exportación.',
            ComprobanteEnum::MetodoPago        => 'Atributo condicional para precisar la clave del método de pago que aplica para este comprobante fiscal digital por Internet, conforme al Artículo 29-A fracción VII incisos a y b del CFF.',
            ComprobanteEnum::LugarExpedicion   => 'Atributo requerido para incorporar el código postal del lugar de expedición del comprobante (domicilio de la matriz o de la sucursal).',
            ComprobanteEnum::Confirmacion      => 'Atributo condicional para registrar la clave de confirmación que entregue el PAC para expedir el comprobante con importes grandes, con un tipo de cambio fuera del rango establecido o con ambos casos. Es requerido cuando se registra un tipo de cambio o un total fuera del rango establecido.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ComprobanteEnum::Version           => BaseEnum::XS_STRING,
            ComprobanteEnum::Serie             => BaseEnum::XS_STRING,
            ComprobanteEnum::Folio             => BaseEnum::XS_STRING,
            ComprobanteEnum::Fecha             => Types\TdCFDIEnum::T_FechaH->base(),
            ComprobanteEnum::Sello             => BaseEnum::XS_STRING,
            ComprobanteEnum::FormaPago         => Types\CatCFDIEnum::C_FormaPago->base(),
            ComprobanteEnum::NoCertificado     => BaseEnum::XS_STRING,
            ComprobanteEnum::Certificado       => BaseEnum::XS_STRING,
            ComprobanteEnum::CondicionesDePago => BaseEnum::XS_STRING,
            ComprobanteEnum::SubTotal          => Types\TdCFDIEnum::T_Importe->base(),
            ComprobanteEnum::Descuento         => Types\TdCFDIEnum::T_Importe->base(),
            ComprobanteEnum::Moneda            => Types\CatCFDIEnum::C_Moneda->base(),
            ComprobanteEnum::TipoCambio        => BaseEnum::XS_DECIMAL,
            ComprobanteEnum::Total             => Types\TdCFDIEnum::T_Importe->base(),
            ComprobanteEnum::TipoDeComprobante => Types\CatCFDIEnum::C_TipoDeComprobante->base(),
            ComprobanteEnum::Exportacion       => Types\CatCFDIEnum::C_Exportacion->base(),
            ComprobanteEnum::MetodoPago        => Types\CatCFDIEnum::C_MetodoPago->base(),
            ComprobanteEnum::LugarExpedicion   => Types\CatCFDIEnum::C_CodigoPostal->base(),
            ComprobanteEnum::Confirmacion      => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ComprobanteEnum::Version           => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ComprobanteEnum::Serie             => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('25'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,25}'),
            ],
            ComprobanteEnum::Folio             => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('40'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,40}'),
            ],
            ComprobanteEnum::Fecha             => Types\TdCFDIEnum::T_FechaH->restrictionRules(),
            ComprobanteEnum::Sello             => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ComprobanteEnum::FormaPago         => Types\CatCFDIEnum::C_FormaPago->restrictionRules(),
            ComprobanteEnum::NoCertificado     => [
                CommonRules\LengthRule::class => new CommonRules\LengthRule('20'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{20}'),
            ],
            ComprobanteEnum::Certificado       => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ComprobanteEnum::CondicionesDePago => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('1000'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,1000}'),
            ],
            ComprobanteEnum::SubTotal          => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ComprobanteEnum::Descuento         => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ComprobanteEnum::Moneda            => Types\CatCFDIEnum::C_Moneda->restrictionRules(),
            ComprobanteEnum::TipoCambio        => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ComprobanteEnum::Total             => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ComprobanteEnum::TipoDeComprobante => Types\CatCFDIEnum::C_TipoDeComprobante->restrictionRules(),
            ComprobanteEnum::Exportacion       => Types\CatCFDIEnum::C_Exportacion->restrictionRules(),
            ComprobanteEnum::MetodoPago        => Types\CatCFDIEnum::C_MetodoPago->restrictionRules(),
            ComprobanteEnum::LugarExpedicion   => Types\CatCFDIEnum::C_CodigoPostal->restrictionRules(),
            ComprobanteEnum::Confirmacion      => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\LengthRule::class => new CommonRules\LengthRule('5'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9a-zA-Z]{5}'),
            ],
        };
    }
}
