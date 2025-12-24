<?php

namespace App\Containers\Sat\Cfdi\Enums\V33\Comprobante\CfdiRelacionados;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum CfdiRelacionadoEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case UUID                 = 'UUID';

    public function annotation(): string
    {
        return match($this)
        {
            CfdiRelacionadoEnum::UUID => 'Atributo requerido para registrar el folio fiscal (UUID) de un CFDI relacionado con el presente comprobante, por ejemplo: Si el CFDI relacionado es un comprobante de traslado que sirve para registrar el movimiento de la mercancía. Si este comprobante se usa como nota de crédito o nota de débito del comprobante relacionado. Si este comprobante es una devolución sobre el comprobante relacionado. Si éste sustituye a una factura cancelada.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            CfdiRelacionadoEnum::UUID => BaseEnum::XS_STRING,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            CfdiRelacionadoEnum::UUID => [
                CommonRules\LengthRule::class => new CommonRules\LengthRule('36'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[a-f0-9A-F]{8}-[a-f0-9A-F]{4}-[a-f0-9A-F]{4}-[a-f0-9A-F]{4}-[a-f0-9A-F]{12}'),
            ],
        };
    }
}
