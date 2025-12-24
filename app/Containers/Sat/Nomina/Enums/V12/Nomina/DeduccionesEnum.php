<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum DeduccionesEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TotalOtrasDeducciones               = 'TotalOtrasDeducciones';
    case TotalImpuestosRetenidos             = 'TotalImpuestosRetenidos';

    public function annotation(): string
    {
        return match($this)
        {
            DeduccionesEnum::TotalOtrasDeducciones   => 'Atributo condicional para expresar el total de deducciones que se relacionan en el comprobante, donde la clave de tipo de deducción sea distinta a la 002 correspondiente a ISR.',
            DeduccionesEnum::TotalImpuestosRetenidos => 'Atributo condicional para expresar el total de los impuestos federales retenidos, es decir, donde la clave de tipo de deducción sea 002 correspondiente a ISR.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            DeduccionesEnum::TotalOtrasDeducciones   => Types\TdCFDIEnum::T_ImporteMXN->base(),
            DeduccionesEnum::TotalImpuestosRetenidos => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            DeduccionesEnum::TotalOtrasDeducciones   => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            DeduccionesEnum::TotalImpuestosRetenidos => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
