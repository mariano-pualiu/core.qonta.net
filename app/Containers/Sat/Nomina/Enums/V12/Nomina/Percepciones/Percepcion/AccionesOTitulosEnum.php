<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones\Percepcion;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum AccionesOTitulosEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case ValorMercado                       = 'ValorMercado';
    case PrecioAlOtorgarse                  = 'PrecioAlOtorgarse';

    public function annotation(): string
    {
        return match($this)
        {
            AccionesOTitulosEnum::ValorMercado      => 'Atributo requerido para expresar el valor de mercado de las Acciones o Títulos valor al ejercer la opción.',
            AccionesOTitulosEnum::PrecioAlOtorgarse => 'Atributo requerido para expresar el precio establecido al otorgarse la opción de ingresos en acciones o títulos valor.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            AccionesOTitulosEnum::ValorMercado      => BaseEnum::XS_DECIMAL,
            AccionesOTitulosEnum::PrecioAlOtorgarse => BaseEnum::XS_DECIMAL,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            AccionesOTitulosEnum::ValorMercado      => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            AccionesOTitulosEnum::PrecioAlOtorgarse => [
                CommonRules\FractionDigitsRule::class => new CommonRules\FractionDigitsRule('6'),
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0.000001'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
        };
    }
}
