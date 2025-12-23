<?php

namespace App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum ACuentaTercerosEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case RfcACuentaTerceros                             = 'RfcACuentaTerceros';
    case NombreACuentaTerceros                          = 'NombreACuentaTerceros';
    case RegimenFiscalACuentaTerceros                   = 'RegimenFiscalACuentaTerceros';
    case DomicilioFiscalACuentaTerceros                 = 'DomicilioFiscalACuentaTerceros';

    public function annotation(): string
    {
        return match($this)
        {
            ACuentaTercerosEnum::RfcACuentaTerceros             => 'Atributo requerido para registrar la Clave del Registro Federal de Contribuyentes del contribuyente Tercero, a cuenta del que se realiza la operación.',
            ACuentaTercerosEnum::NombreACuentaTerceros          => 'Atributo requerido para registrar el nombre, denominación o razón social del contribuyente Tercero correspondiente con el Rfc, a cuenta del que se realiza la operación.',
            ACuentaTercerosEnum::RegimenFiscalACuentaTerceros   => 'Atributo requerido para incorporar la clave del régimen del contribuyente Tercero, a cuenta del que se realiza la operación.',
            ACuentaTercerosEnum::DomicilioFiscalACuentaTerceros => 'Atributo requerido para incorporar el código postal del domicilio fiscal del Tercero, a cuenta del que se realiza la operación.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ACuentaTercerosEnum::RfcACuentaTerceros             => Types\TdCFDIEnum::T_RFC->base(),
            ACuentaTercerosEnum::NombreACuentaTerceros          => BaseEnum::XS_STRING,
            ACuentaTercerosEnum::RegimenFiscalACuentaTerceros   => Types\CatCFDIEnum::C_RegimenFiscal->base(),
            ACuentaTercerosEnum::DomicilioFiscalACuentaTerceros => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ACuentaTercerosEnum::RfcACuentaTerceros             => Types\TdCFDIEnum::T_RFC->restrictionRules(),
            ACuentaTercerosEnum::NombreACuentaTerceros          => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('300'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,300}'),
            ],
            ACuentaTercerosEnum::RegimenFiscalACuentaTerceros   => Types\CatCFDIEnum::C_RegimenFiscal->restrictionRules(),
            ACuentaTercerosEnum::DomicilioFiscalACuentaTerceros => [
                CommonRules\LengthRule::class => new CommonRules\LengthRule('5'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{5}'),
            ],
        };
    }
}
