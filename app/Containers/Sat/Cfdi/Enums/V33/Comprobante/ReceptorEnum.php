<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum ReceptorEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Rfc                       = 'Rfc';
    case Nombre                    = 'Nombre';
    case ResidenciaFiscal          = 'ResidenciaFiscal';
    case NumRegIdTrib              = 'NumRegIdTrib';
    case UsoCFDI                   = 'UsoCFDI';

    public function annotation(): string
    {
        return match($this)
        {
            ReceptorEnum::Rfc              => 'Atributo requerido para precisar la Clave del Registro Federal de Contribuyentes correspondiente al contribuyente receptor del comprobante.',
            ReceptorEnum::Nombre           => 'Atributo opcional para precisar el nombre, denominación o razón social del contribuyente receptor del comprobante.',
            ReceptorEnum::ResidenciaFiscal => 'Atributo condicional para registrar la clave del país de residencia para efectos fiscales del receptor del comprobante, cuando se trate de un extranjero, y que es conforme con la especificación ISO 3166-1 alpha-3. Es requerido cuando se incluya el complemento de comercio exterior o se registre el atributo NumRegIdTrib.',
            ReceptorEnum::NumRegIdTrib     => 'Atributo condicional para expresar el número de registro de identidad fiscal del receptor cuando sea residente en el  extranjero. Es requerido cuando se incluya el complemento de comercio exterior.',
            ReceptorEnum::UsoCFDI          => 'Atributo requerido para expresar la clave del uso que dará a esta factura el receptor del CFDI.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ReceptorEnum::Rfc              => Types\TdCFDIEnum::T_RFC->base(),
            ReceptorEnum::Nombre           => BaseEnum::XS_STRING,
            ReceptorEnum::ResidenciaFiscal => Types\CatCFDIEnum::C_Pais->base(),
            ReceptorEnum::NumRegIdTrib     => BaseEnum::XS_STRING,
            ReceptorEnum::UsoCFDI          => Types\CatCFDIEnum::C_UsoCFDI->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ReceptorEnum::Rfc              => Types\TdCFDIEnum::T_RFC->restrictionRules(),
            ReceptorEnum::Nombre           => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('254'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,254}'),
            ],
            ReceptorEnum::ResidenciaFiscal => Types\CatCFDIEnum::C_Pais->restrictionRules(),
            ReceptorEnum::NumRegIdTrib     => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('40'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            ReceptorEnum::UsoCFDI          => Types\CatCFDIEnum::C_UsoCFDI->restrictionRules(),
        };
    }
}
