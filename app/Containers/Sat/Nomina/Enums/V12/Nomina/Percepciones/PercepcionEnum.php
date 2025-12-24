<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum PercepcionEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TipoPercepcion            = 'TipoPercepcion';
    case Clave                     = 'Clave';
    case Concepto                  = 'Concepto';
    case ImporteGravado            = 'ImporteGravado';
    case ImporteExento             = 'ImporteExento';

    public function annotation(): string
    {
        return match($this)
        {
            PercepcionEnum::TipoPercepcion => 'Atributo requerido para expresar la Clave agrupadora bajo la cual se clasifica la percepción.',
            PercepcionEnum::Clave          => 'Atributo requerido para expresar la clave de percepción de nómina propia de la contabilidad de cada patrón, puede conformarse desde 3 hasta 15 caracteres.',
            PercepcionEnum::Concepto       => 'Atributo requerido para la descripción del concepto de percepción',
            PercepcionEnum::ImporteGravado => 'Atributo requerido, representa el importe gravado de un concepto de percepción.',
            PercepcionEnum::ImporteExento  => 'Atributo requerido, representa el importe exento de un concepto de percepción.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            PercepcionEnum::TipoPercepcion => Types\CatNominaEnum::C_TipoPercepcion->base(),
            PercepcionEnum::Clave          => BaseEnum::XS_STRING,
            PercepcionEnum::Concepto       => BaseEnum::XS_STRING,
            PercepcionEnum::ImporteGravado => Types\TdCFDIEnum::T_ImporteMXN->base(),
            PercepcionEnum::ImporteExento  => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            PercepcionEnum::TipoPercepcion => Types\CatNominaEnum::C_TipoPercepcion->restrictionRules(),
            PercepcionEnum::Clave          => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('3'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('15'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{3,15}'),
            ],
            PercepcionEnum::Concepto       => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            PercepcionEnum::ImporteGravado => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            PercepcionEnum::ImporteExento  => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
