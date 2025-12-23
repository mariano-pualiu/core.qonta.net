<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Deducciones;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum DeduccionEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TipoDeduccion           = 'TipoDeduccion';
    case Clave                   = 'Clave';
    case Concepto                = 'Concepto';
    case Importe                 = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            DeduccionEnum::TipoDeduccion => 'Atributo requerido para registrar la clave agrupadora que clasifica la deducción.',
            DeduccionEnum::Clave         => 'Atributo requerido para la clave de deducción de nómina propia de la contabilidad de cada patrón, puede conformarse desde 3 hasta 15 caracteres.',
            DeduccionEnum::Concepto      => 'Atributo requerido para la descripción del concepto de deducción.',
            DeduccionEnum::Importe       => 'Atributo requerido para registrar el importe del concepto de deducción.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            DeduccionEnum::TipoDeduccion => Types\CatNominaEnum::C_TipoDeduccion->base(),
            DeduccionEnum::Clave         => BaseEnum::XS_STRING,
            DeduccionEnum::Concepto      => BaseEnum::XS_STRING,
            DeduccionEnum::Importe       => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            DeduccionEnum::TipoDeduccion => Types\CatNominaEnum::C_TipoDeduccion->restrictionRules(),
            DeduccionEnum::Clave         => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('3'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('15'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{3,15}'),
            ],
            DeduccionEnum::Concepto      => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            DeduccionEnum::Importe       => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
