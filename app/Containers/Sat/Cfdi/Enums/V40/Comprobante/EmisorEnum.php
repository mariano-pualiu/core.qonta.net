<?php

namespace App\Containers\Sat\Cfdi\Enums\V40\Comprobante;

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

    case Rfc                     = 'Rfc';
    case Nombre                  = 'Nombre';
    case RegimenFiscal           = 'RegimenFiscal';
    case FacAtrAdquirente        = 'FacAtrAdquirente';

    public function annotation(): string
    {
        return match($this)
        {
            EmisorEnum::Rfc              => 'Atributo requerido para registrar la Clave del Registro Federal de Contribuyentes correspondiente al contribuyente emisor del comprobante.',
            EmisorEnum::Nombre           => 'Atributo requerido para registrar el nombre, denominación o razón social del contribuyente inscrito en el RFC, del emisor del comprobante.',
            EmisorEnum::RegimenFiscal    => 'Atributo requerido para incorporar la clave del régimen del contribuyente emisor al que aplicará el efecto fiscal de este comprobante.',
            EmisorEnum::FacAtrAdquirente => 'Atributo condicional para expresar el número de operación proporcionado por el SAT cuando se trate de un comprobante a través de un PCECFDI o un PCGCFDISP.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            EmisorEnum::Rfc              => Types\TdCFDIEnum::T_RFC->base(),
            EmisorEnum::Nombre           => BaseEnum::XS_STRING,
            EmisorEnum::RegimenFiscal    => Types\CatCFDIEnum::C_RegimenFiscal->base(),
            EmisorEnum::FacAtrAdquirente => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            EmisorEnum::Rfc              => Types\TdCFDIEnum::T_RFC->restrictionRules(),
            EmisorEnum::Nombre           => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('300'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,300}'),
            ],
            EmisorEnum::RegimenFiscal    => Types\CatCFDIEnum::C_RegimenFiscal->restrictionRules(),
            EmisorEnum::FacAtrAdquirente => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\LengthRule::class => new CommonRules\LengthRule('10'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{10}'),
            ],
        };
    }
}
