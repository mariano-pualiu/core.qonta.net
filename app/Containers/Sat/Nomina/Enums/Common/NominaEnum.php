<?php

namespace App\Containers\Sat\Nomina\Enums\Common;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts\SimpleTypeEnumContract;

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
