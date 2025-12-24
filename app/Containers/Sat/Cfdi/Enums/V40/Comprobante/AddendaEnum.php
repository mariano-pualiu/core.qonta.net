<?php

namespace App\Containers\Sat\Cfdi\Enums\V40\Comprobante;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum AddendaEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    

    public function annotation(): string
    {
        return match($this)
        {
            
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            
        };
    }
}
