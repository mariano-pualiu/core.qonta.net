<?php

namespace App\Containers\Sat\Cfdi\Enums\V40\Comprobante;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum InformacionGlobalEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Periodicidad                   = 'Periodicidad';
    case Meses                          = 'Meses';
    case Año                            = 'Año';

    public function annotation(): string
    {
        return match($this)
        {
            InformacionGlobalEnum::Periodicidad => 'Atributo requerido para expresar el período al que corresponde la información del comprobante global.',
            InformacionGlobalEnum::Meses        => 'Atributo requerido para expresar el mes o los meses al que corresponde la información del comprobante global.',
            InformacionGlobalEnum::Año          => 'Atributo requerido para expresar el año al que corresponde la información del comprobante global.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            InformacionGlobalEnum::Periodicidad => Types\CatCFDIEnum::C_Periodicidad->base(),
            InformacionGlobalEnum::Meses        => Types\CatCFDIEnum::C_Meses->base(),
            InformacionGlobalEnum::Año          => BaseEnum::,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            InformacionGlobalEnum::Periodicidad => Types\CatCFDIEnum::C_Periodicidad->restrictionRules(),
            InformacionGlobalEnum::Meses        => Types\CatCFDIEnum::C_Meses->restrictionRules(),
            InformacionGlobalEnum::Año          => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('2021'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
        };
    }
}
