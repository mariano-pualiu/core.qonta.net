<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina;

use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;
use ArchTech\Enums\Options;

enum EmisorEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Curp                    = 'Curp';
    case RegistroPatronal        = 'RegistroPatronal';
    case RfcPatronOrigen         = 'RfcPatronOrigen';

    public function annotation(): string
    {
        return match($this)
        {
            EmisorEnum::Curp             => 'Atributo condicional para expresar la CURP del emisor del comprobante de nómina cuando es una persona física.',
            EmisorEnum::RegistroPatronal => 'Atributo condicional para expresar el registro patronal, clave de ramo - pagaduría o la que le asigne la institución de seguridad social al patrón, a 20 posiciones máximo. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            EmisorEnum::RfcPatronOrigen  => 'Atributo opcional para expresar el RFC de la persona que fungió como patrón cuando el pago al trabajador se realice a través de un tercero como vehículo o herramienta de pago.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            EmisorEnum::Curp             => Types\TdCFDIEnum::T_CURP->base(),
            EmisorEnum::RegistroPatronal => BaseEnum::XS_STRING,
            EmisorEnum::RfcPatronOrigen  => Types\TdCFDIEnum::T_RFC->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            EmisorEnum::Curp             => Types\TdCFDIEnum::T_CURP->restrictionRules(),
            EmisorEnum::RegistroPatronal => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('20'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,20}'),
            ],
            EmisorEnum::RfcPatronOrigen  => Types\TdCFDIEnum::T_RFC->restrictionRules(),
        };
    }
}
