<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Receptor;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum SubContratacionEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case RfcLabora                        = 'RfcLabora';
    case PorcentajeTiempo                 = 'PorcentajeTiempo';

    public function annotation(): string
    {
        return match($this)
        {
            SubContratacionEnum::RfcLabora        => 'Atributo requerido para expresar el RFC de la persona que subcontrata.',
            SubContratacionEnum::PorcentajeTiempo => 'Atributo requerido para expresar el porcentaje del tiempo que prestó sus servicios con el RFC que lo subcontrata.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            SubContratacionEnum::RfcLabora        => Types\TdCFDIEnum::T_RFC->base(),
            SubContratacionEnum::PorcentajeTiempo => BaseEnum::XS_DECIMAL,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            SubContratacionEnum::RfcLabora        => Types\TdCFDIEnum::T_RFC->restrictionRules(),
            SubContratacionEnum::PorcentajeTiempo => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.001'),
                CommonRules\MaxInclusiveRule::class => new CommonRules\MaxInclusiveRule('100.000'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{1,3}(.([0-9]{1,3}))?'),
            ],
        };
    }
}
