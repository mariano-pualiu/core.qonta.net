<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Emisor;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum EntidadSNCFEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case OrigenRecurso                  = 'OrigenRecurso';
    case MontoRecursoPropio             = 'MontoRecursoPropio';

    public function annotation(): string
    {
        return match($this)
        {
            EntidadSNCFEnum::OrigenRecurso      => 'Atributo requerido para identificar el origen del recurso utilizado para el pago de nómina del personal que presta o desempeña un servicio personal subordinado o asimilado a salarios en las dependencias.',
            EntidadSNCFEnum::MontoRecursoPropio => 'Atributo condicional para expresar el monto del recurso pagado con cargo a sus participaciones u otros ingresos locales (importe bruto de los ingresos propios, es decir total de gravados y exentos), cuando el origen es mixto.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            EntidadSNCFEnum::OrigenRecurso      => Types\CatNominaEnum::C_OrigenRecurso->base(),
            EntidadSNCFEnum::MontoRecursoPropio => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            EntidadSNCFEnum::OrigenRecurso      => Types\CatNominaEnum::C_OrigenRecurso->restrictionRules(),
            EntidadSNCFEnum::MontoRecursoPropio => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
