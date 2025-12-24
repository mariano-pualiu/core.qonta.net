<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum CfdiRelacionadosEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TipoRelacion                  = 'TipoRelacion';

    public function annotation(): string
    {
        return match($this)
        {
            CfdiRelacionadosEnum::TipoRelacion => 'Atributo requerido para indicar la clave de la relación que existe entre éste que se esta generando y el o los CFDI previos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            CfdiRelacionadosEnum::TipoRelacion => Types\CatCFDIEnum::C_TipoRelacion->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            CfdiRelacionadosEnum::TipoRelacion => Types\CatCFDIEnum::C_TipoRelacion->restrictionRules(),
        };
    }
}
