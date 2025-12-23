<?php

namespace App\Containers\Sat\Nomina\Enums\Common;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;

enum NominaEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Version = 'Version';

    public function annotation(): string
    {
        return match($this)
        {
            NominaEnum::Version => 'Atributo requerido para la expresión de la versión del complemento.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            NominaEnum::Version => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            NominaEnum::Version => [],
        };
    }
}
