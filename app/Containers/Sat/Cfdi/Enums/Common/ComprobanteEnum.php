<?php

namespace App\Containers\Sat\Cfdi\Enums\Common;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;

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
