<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\OtrosPagos\OtroPago;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum SubsidioAlEmpleoEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case SubsidioCausado                  = 'SubsidioCausado';

    public function annotation(): string
    {
        return match($this)
        {
            SubsidioAlEmpleoEnum::SubsidioCausado => 'Atributo requerido para expresar el subsidio causado conforme a la tabla del subsidio para el empleo publicada en el Anexo 8 de la RMF vigente.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            SubsidioAlEmpleoEnum::SubsidioCausado => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            SubsidioAlEmpleoEnum::SubsidioCausado => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
