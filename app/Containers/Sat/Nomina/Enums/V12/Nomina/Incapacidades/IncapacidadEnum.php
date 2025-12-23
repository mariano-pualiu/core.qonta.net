<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Incapacidades;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum IncapacidadEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case DiasIncapacidad              = 'DiasIncapacidad';
    case TipoIncapacidad              = 'TipoIncapacidad';
    case ImporteMonetario             = 'ImporteMonetario';

    public function annotation(): string
    {
        return match($this)
        {
            IncapacidadEnum::DiasIncapacidad  => 'Atributo requerido para expresar el número de días enteros que el trabajador se incapacitó en el periodo.',
            IncapacidadEnum::TipoIncapacidad  => 'Atributo requerido para expresar la razón de la incapacidad.',
            IncapacidadEnum::ImporteMonetario => 'Atributo condicional para expresar el monto del importe monetario de la incapacidad.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            IncapacidadEnum::DiasIncapacidad  => BaseEnum::XS_INT,
            IncapacidadEnum::TipoIncapacidad  => Types\CatNominaEnum::C_TipoIncapacidad->base(),
            IncapacidadEnum::ImporteMonetario => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            IncapacidadEnum::DiasIncapacidad  => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('1'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            IncapacidadEnum::TipoIncapacidad  => Types\CatNominaEnum::C_TipoIncapacidad->restrictionRules(),
            IncapacidadEnum::ImporteMonetario => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
