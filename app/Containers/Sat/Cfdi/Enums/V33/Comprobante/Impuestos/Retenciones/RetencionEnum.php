<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Impuestos\Retenciones;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum RetencionEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Impuesto           = 'Impuesto';
    case Importe            = 'Importe';

    public function annotation(): string
    {
        return match($this)
        {
            RetencionEnum::Impuesto => 'Atributo requerido para señalar la clave del tipo de impuesto retenido',
            RetencionEnum::Importe  => 'Atributo requerido para señalar el monto del impuesto retenido. No se permiten valores negativos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            RetencionEnum::Impuesto => Types\CatCFDIEnum::C_Impuesto->base(),
            RetencionEnum::Importe  => Types\TdCFDIEnum::T_Importe->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            RetencionEnum::Impuesto => Types\CatCFDIEnum::C_Impuesto->restrictionRules(),
            RetencionEnum::Importe  => Types\TdCFDIEnum::T_Importe->restrictionRules(),
        };
    }
}
