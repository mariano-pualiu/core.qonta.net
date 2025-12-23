<?php

namespace App\Containers\Sat\Tfd\Enums\Common;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;

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
