<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina\Percepciones;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum SeparacionIndemnizacionEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TotalPagado                                 = 'TotalPagado';
    case NumAñosServicio                             = 'NumAñosServicio';
    case UltimoSueldoMensOrd                         = 'UltimoSueldoMensOrd';
    case IngresoAcumulable                           = 'IngresoAcumulable';
    case IngresoNoAcumulable                         = 'IngresoNoAcumulable';

    public function annotation(): string
    {
        return match($this)
        {
            SeparacionIndemnizacionEnum::TotalPagado         => 'Atributo requerido que indica el monto total del pago.',
            SeparacionIndemnizacionEnum::NumAñosServicio     => 'Atributo requerido para expresar el número de años de servicio del trabajador. Se redondea al entero superior si la cifra contiene años y meses y hay más de 6 meses.',
            SeparacionIndemnizacionEnum::UltimoSueldoMensOrd => 'Atributo requerido que indica el último sueldo mensual ordinario.',
            SeparacionIndemnizacionEnum::IngresoAcumulable   => 'Atributo requerido para expresar los ingresos acumulables.',
            SeparacionIndemnizacionEnum::IngresoNoAcumulable => 'Atributo requerido que indica los ingresos no acumulables.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            SeparacionIndemnizacionEnum::TotalPagado         => Types\TdCFDIEnum::T_ImporteMXN->base(),
            SeparacionIndemnizacionEnum::NumAñosServicio     => BaseEnum::XS_INT,
            SeparacionIndemnizacionEnum::UltimoSueldoMensOrd => Types\TdCFDIEnum::T_ImporteMXN->base(),
            SeparacionIndemnizacionEnum::IngresoAcumulable   => Types\TdCFDIEnum::T_ImporteMXN->base(),
            SeparacionIndemnizacionEnum::IngresoNoAcumulable => Types\TdCFDIEnum::T_ImporteMXN->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            SeparacionIndemnizacionEnum::TotalPagado         => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            SeparacionIndemnizacionEnum::NumAñosServicio     => [
                CommonRules\MinInclusiveRule::class => new CommonRules\MinInclusiveRule('0'),
                CommonRules\MaxInclusiveRule::class => new CommonRules\MaxInclusiveRule('99'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
            ],
            SeparacionIndemnizacionEnum::UltimoSueldoMensOrd => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            SeparacionIndemnizacionEnum::IngresoAcumulable   => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            SeparacionIndemnizacionEnum::IngresoNoAcumulable => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
        };
    }
}
