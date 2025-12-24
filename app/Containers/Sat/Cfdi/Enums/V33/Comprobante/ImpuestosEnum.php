<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum ImpuestosEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case TotalImpuestosRetenidos             = 'TotalImpuestosRetenidos';
    case TotalImpuestosTrasladados           = 'TotalImpuestosTrasladados';

    public function annotation(): string
    {
        return match($this)
        {
            ImpuestosEnum::TotalImpuestosRetenidos   => 'Atributo condicional para expresar el total de los impuestos retenidos que se desprenden de los conceptos expresados en el comprobante fiscal digital por Internet. No se permiten valores negativos. Es requerido cuando en los conceptos se registren impuestos retenidos',
            ImpuestosEnum::TotalImpuestosTrasladados => 'Atributo condicional para expresar el total de los impuestos trasladados que se desprenden de los conceptos expresados en el comprobante fiscal digital por Internet. No se permiten valores negativos. Es requerido cuando en los conceptos se registren impuestos trasladados.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ImpuestosEnum::TotalImpuestosRetenidos   => Types\TdCFDIEnum::T_Importe->base(),
            ImpuestosEnum::TotalImpuestosTrasladados => Types\TdCFDIEnum::T_Importe->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ImpuestosEnum::TotalImpuestosRetenidos   => Types\TdCFDIEnum::T_Importe->restrictionRules(),
            ImpuestosEnum::TotalImpuestosTrasladados => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
