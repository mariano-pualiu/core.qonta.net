<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\Percepcion;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum HorasExtraEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Dias                     = 'Dias';
    case TipoHoras                = 'TipoHoras';
    case HorasExtra               = 'HorasExtra';
    case ImportePagado            = 'ImportePagado';

    public function annotation(): string
    {
        return match($this)
        {
            HorasExtraEnum::Dias          => 'Atributo requerido para expresar el número de días en que el trabajador realizó horas extra en el periodo.',
            HorasExtraEnum::TipoHoras     => 'Atributo requerido para expresar el tipo de pago de las horas extra.',
            HorasExtraEnum::HorasExtra    => 'Atributo requerido para expresar el número de horas extra trabajadas en el periodo.',
            HorasExtraEnum::ImportePagado => 'Atributo requerido para expresar el importe pagado por las horas extra.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            HorasExtraEnum::Dias          => BaseEnum::XS_INT,
            HorasExtraEnum::TipoHoras     => Types\CatNominaEnum::C_TipoHoras->base(),
            HorasExtraEnum::HorasExtra    => BaseEnum::XS_INT,
            HorasExtraEnum::ImportePagado => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            HorasExtraEnum::Dias          => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('1'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            HorasExtraEnum::TipoHoras     => Types\CatNominaEnum::C_TipoHoras->restrictionRules(),
            HorasExtraEnum::HorasExtra    => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('1'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            HorasExtraEnum::ImportePagado => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
