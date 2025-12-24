<?php

namespace App\Containers\Sat\Cfdi\Enums\V40\Comprobante\Conceptos\Concepto\Parte;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum InformacionAduaneraEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case NumeroPedimento                     = 'NumeroPedimento';

    public function annotation(): string
    {
        return match($this)
        {
            InformacionAduaneraEnum::NumeroPedimento => 'Atributo requerido para expresar el número del pedimento que ampara la importación del bien que se expresa en el siguiente formato: últimos 2 dígitos del año de validación seguidos por dos espacios, 2 dígitos de la aduana de despacho seguidos por dos espacios, 4 dígitos del número de la patente seguidos por dos espacios, 1 dígito que corresponde al último dígito del año en curso, salvo que se trate de un pedimento consolidado iniciado en el año inmediato anterior o del pedimento original de una rectificación, seguido de 6 dígitos de la numeración progresiva por aduana.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            InformacionAduaneraEnum::NumeroPedimento => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            InformacionAduaneraEnum::NumeroPedimento => [
                CommonRules\LengthRule::class => new CommonRules\LengthRule('21'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{2}  [0-9]{2}  [0-9]{4}  [0-9]{7}'),
            ],
        };
    }
}
