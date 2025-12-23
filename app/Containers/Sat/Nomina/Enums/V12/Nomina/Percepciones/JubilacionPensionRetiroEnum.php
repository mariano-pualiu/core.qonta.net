<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum JubilacionPensionRetiroEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TotalUnaExhibicion                          = 'TotalUnaExhibicion';
    case TotalParcialidad                            = 'TotalParcialidad';
    case MontoDiario                                 = 'MontoDiario';
    case IngresoAcumulable                           = 'IngresoAcumulable';
    case IngresoNoAcumulable                         = 'IngresoNoAcumulable';

    public function annotation(): string
    {
        return match($this)
        {
            JubilacionPensionRetiroEnum::TotalUnaExhibicion  => 'Atributo condicional que indica el monto total del pago cuando se realiza en una sola exhibición.',
            JubilacionPensionRetiroEnum::TotalParcialidad    => 'Atributo condicional para expresar los ingresos totales por pago cuando se hace en parcialidades.',
            JubilacionPensionRetiroEnum::MontoDiario         => 'Atributo condicional para expresar el monto diario percibido por jubilación, pensiones o haberes de retiro cuando se realiza en parcialidades.',
            JubilacionPensionRetiroEnum::IngresoAcumulable   => 'Atributo requerido para expresar los ingresos acumulables.',
            JubilacionPensionRetiroEnum::IngresoNoAcumulable => 'Atributo requerido para expresar los ingresos no acumulables.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            JubilacionPensionRetiroEnum::TotalUnaExhibicion  => Types\TdCFDIEnum::T_ImporteMXN->base(),
            JubilacionPensionRetiroEnum::TotalParcialidad    => Types\TdCFDIEnum::T_ImporteMXN->base(),
            JubilacionPensionRetiroEnum::MontoDiario         => Types\TdCFDIEnum::T_ImporteMXN->base(),
            JubilacionPensionRetiroEnum::IngresoAcumulable   => Types\TdCFDIEnum::T_ImporteMXN->base(),
            JubilacionPensionRetiroEnum::IngresoNoAcumulable => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            JubilacionPensionRetiroEnum::TotalUnaExhibicion  => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            JubilacionPensionRetiroEnum::TotalParcialidad    => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            JubilacionPensionRetiroEnum::MontoDiario         => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            JubilacionPensionRetiroEnum::IngresoAcumulable   => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            JubilacionPensionRetiroEnum::IngresoNoAcumulable => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
