<?php

namespace App\Containers\Sat\Tfd\Enums\Common;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts\SimpleTypeEnumContract;

enum TimbreFiscalDigitalEnum: string implements SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Version = 'Version';

    public function annotation(): string
    {
        return match($this)
        {
            TimbreFiscalDigitalEnum::Version => 'Atributo requerido para la expresión de la versión del estándar del Timbre Fiscal Digital',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            TimbreFiscalDigitalEnum::Version => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            TimbreFiscalDigitalEnum::Version => [],
        };
    }
}
