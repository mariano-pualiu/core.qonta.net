<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum EmisorEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Rfc                  = 'Rfc';
    case Nombre               = 'Nombre';
    case RegimenFiscal        = 'RegimenFiscal';

    public function annotation(): string
    {
        return match($this)
        {
            EmisorEnum::Rfc           => 'Atributo requerido para registrar la Clave del Registro Federal de Contribuyentes correspondiente al contribuyente emisor del comprobante.',
            EmisorEnum::Nombre        => 'Atributo opcional para registrar el nombre, denominación o razón social del contribuyente emisor del comprobante.',
            EmisorEnum::RegimenFiscal => 'Atributo requerido para incorporar la clave del régimen del contribuyente emisor al que aplicará el efecto fiscal de este comprobante.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            EmisorEnum::Rfc           => Types\TdCFDIEnum::T_RFC->base(),
            EmisorEnum::Nombre        => BaseEnum::XS_STRING,
            EmisorEnum::RegimenFiscal => Types\CatCFDIEnum::C_RegimenFiscal->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            EmisorEnum::Rfc           => Types\TdCFDIEnum::T_RFC->restrictionRules(),
            EmisorEnum::Nombre        => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('254'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,254}'),
            ],
            EmisorEnum::RegimenFiscal => Types\CatCFDIEnum::C_RegimenFiscal->restrictionRules(),
        };
    }
}
