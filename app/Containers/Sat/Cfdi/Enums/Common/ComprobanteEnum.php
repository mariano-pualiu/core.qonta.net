<?php

namespace App\Containers\Sat\Cfdi\Enums\Common;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzer\Common\Rules;

enum ComprobanteEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Version = 'Version';

    public function annotation(): string
    {
        return match($this)
        {
            ComprobanteEnum::Version => 'Atributo requerido con valor prefijado a 3.3 que indica la versión del estándar bajo el que se encuentra expresado el comprobante.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ComprobanteEnum::Version => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ComprobanteEnum::Version => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
            ],
        };
    }
}
