<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\Conceptos\Concepto;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum CuentaPredialEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Numero               = 'Numero';

    public function annotation(): string
    {
        return match($this)
        {
            CuentaPredialEnum::Numero => 'Atributo requerido para precisar el número de la cuenta predial del inmueble cubierto por el presente concepto, o bien para incorporar los datos de identificación del certificado de participación inmobiliaria no amortizable, tratándose de arrendamiento.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            CuentaPredialEnum::Numero => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            CuentaPredialEnum::Numero => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('150'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{1,150}'),
            ],
        };
    }
}
