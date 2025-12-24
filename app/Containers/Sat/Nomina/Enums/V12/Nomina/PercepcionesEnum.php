<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum PercepcionesEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TotalSueldos                              = 'TotalSueldos';
    case TotalSeparacionIndemnizacion              = 'TotalSeparacionIndemnizacion';
    case TotalJubilacionPensionRetiro              = 'TotalJubilacionPensionRetiro';
    case TotalGravado                              = 'TotalGravado';
    case TotalExento                               = 'TotalExento';

    public function annotation(): string
    {
        return match($this)
        {
            PercepcionesEnum::TotalSueldos                 => 'Atributo condicional para expresar el total de percepciones brutas (gravadas y exentas) por sueldos y salarios y conceptos asimilados a salarios.',
            PercepcionesEnum::TotalSeparacionIndemnizacion => 'Atributo condicional para expresar el importe exento y gravado de las claves tipo percepción 022 Prima por Antigüedad, 023 Pagos por separación y 025 Indemnizaciones.',
            PercepcionesEnum::TotalJubilacionPensionRetiro => 'Atributo condicional para expresar el importe exento y gravado de las claves tipo percepción 039 Jubilaciones, pensiones o haberes de retiro en una exhibición y 044 Jubilaciones, pensiones o haberes de retiro en parcialidades.',
            PercepcionesEnum::TotalGravado                 => 'Atributo requerido para expresar el total de percepciones gravadas que se relacionan en el comprobante.',
            PercepcionesEnum::TotalExento                  => 'Atributo requerido para expresar el total de percepciones exentas que se relacionan en el comprobante.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            PercepcionesEnum::TotalSueldos                 => Types\TdCFDIEnum::T_ImporteMXN->base(),
            PercepcionesEnum::TotalSeparacionIndemnizacion => Types\TdCFDIEnum::T_ImporteMXN->base(),
            PercepcionesEnum::TotalJubilacionPensionRetiro => Types\TdCFDIEnum::T_ImporteMXN->base(),
            PercepcionesEnum::TotalGravado                 => Types\TdCFDIEnum::T_ImporteMXN->base(),
            PercepcionesEnum::TotalExento                  => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            PercepcionesEnum::TotalSueldos                 => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            PercepcionesEnum::TotalSeparacionIndemnizacion => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            PercepcionesEnum::TotalJubilacionPensionRetiro => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            PercepcionesEnum::TotalGravado                 => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            PercepcionesEnum::TotalExento                  => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
