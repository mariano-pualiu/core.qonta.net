<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum OtroPagoEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TipoOtroPago          = 'TipoOtroPago';
    case Clave                 = 'Clave';
    case Concepto              = 'Concepto';
    case Importe               = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            OtroPagoEnum::TipoOtroPago => 'Atributo requerido para expresar la clave agrupadora bajo la cual se clasifica el otro pago.',
            OtroPagoEnum::Clave        => 'Atributo requerido, representa la clave de otro pago de nómina propia de la contabilidad de cada patrón, puede conformarse desde 3 hasta 15 caracteres.',
            OtroPagoEnum::Concepto     => 'Atributo requerido para la descripción del concepto de otro pago.',
            OtroPagoEnum::Importe      => 'Atributo requerido para expresar el importe del concepto de otro pago.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            OtroPagoEnum::TipoOtroPago => Types\CatNominaEnum::C_TipoOtroPago->base(),
            OtroPagoEnum::Clave        => BaseEnum::XS_STRING,
            OtroPagoEnum::Concepto     => BaseEnum::XS_STRING,
            OtroPagoEnum::Importe      => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            OtroPagoEnum::TipoOtroPago => Types\CatNominaEnum::C_TipoOtroPago->restrictionRules(),
            OtroPagoEnum::Clave        => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('3'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('15'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{3,15}'),
            ],
            OtroPagoEnum::Concepto     => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            OtroPagoEnum::Importe      => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
