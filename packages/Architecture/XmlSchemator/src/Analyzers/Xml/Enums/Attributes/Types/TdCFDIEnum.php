<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types;

use Architecture\XmlSchemator\Analyzers\Xml\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Contracts\SimpleTypeEnumContract;
use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;

enum TdCFDIEnum: string implements SimpleTypeEnumContract
{
    use Options;

    case T_CURP            = 'tdCFDI:t_CURP';
    case T_Importe         = 'tdCFDI:t_Importe';
    case T_Fecha           = 'tdCFDI:t_Fecha';
    case T_ImporteMXN      = 'tdCFDI:t_ImporteMXN';
    case T_CuentaBancaria  = 'tdCFDI:t_CuentaBancaria';
    case T_RFC             = 'tdCFDI:t_RFC';
    case T_RFC_PM          = 'tdCFDI:t_RFC_PM';
    case T_RFC_PF          = 'tdCFDI:t_RFC_PF';
    case T_FechaHora       = 'tdCFDI:t_FechaHora';
    case T_FechaH          = 'tdCFDI:t_FechaH';
    case T_Descrip100      = 'tdCFDI:t_Descrip100';
    case T_NumeroDomicilio = 'tdCFDI:t_NumeroDomicilio';
    case T_Referencia      = 'tdCFDI:t_Referencia';
    case T_Descrip120      = 'tdCFDI:t_Descrip120';
    case T_TipoCambio      = 'tdCFDI:t_TipoCambio';

    public function annotation(): string
    {
        return match($this)
        {
            TdCFDIEnum::T_CURP            => 'Tipo definido para expresar la Clave Única de Registro de Población (CURP)',
            TdCFDIEnum::T_Importe         => 'Tipo definido para expresar importes numéricos con fracción hasta seis decimales. No se permiten valores negativos.',
            TdCFDIEnum::T_Fecha           => 'Tipo definido para la expresión de la fecha. Se expresa en la forma AAAA-MM-DD.',
            TdCFDIEnum::T_ImporteMXN      => 'Tipo definido para expresar importes monetarios en moneda nacional MXN con fracción hasta dos decimales. No se permiten valores negativos.',
            TdCFDIEnum::T_CuentaBancaria  => 'Tipo definido para expresar la cuenta bancarizada.',
            TdCFDIEnum::T_RFC             => 'Tipo definido para expresar claves del Registro Federal de Contribuyentes',
            TdCFDIEnum::T_RFC_PM          => 'Tipo definido para la expresión de un Registro Federal de Contribuyentes de persona moral.',
            TdCFDIEnum::T_RFC_PF          => 'Tipo definido para la expresión de un Registro Federal de Contribuyentes de persona física.',
            TdCFDIEnum::T_FechaHora       => 'Tipo definido para la expresión de la fecha y hora. Se expresa en la forma AAAA-MM-DDThh:mm:ss',
            TdCFDIEnum::T_FechaH          => 'Tipo definido para la expresión de la fecha y hora. Se expresa en la forma AAAA-MM-DDThh:mm:ss',
            TdCFDIEnum::T_Descrip100      => 'Tipo definido para expresar la calle en que está ubicado el domicilio del emisor del comprobante o del destinatario de la mercancía.',
            TdCFDIEnum::T_NumeroDomicilio => 'Tipo definido para expresar el número interior o el número exterior en donde se ubica el domicilio del emisor del comprobante o del destinatario de la mercancía.',
            TdCFDIEnum::T_Referencia      => 'Tipo definido para expresar la referencia geográfica adicional que permita una  fácil o precisa ubicación del domicilio del emisor del comprobante o del destinatario de la mercancía, por ejemplo las coordenadas GPS.',
            TdCFDIEnum::T_Descrip120      => 'Tipo definido para expresar la colonia, localidad o municipio en que está ubicado el domicilio del emisor del comprobante o del destinatario de la mercancía.',
            TdCFDIEnum::T_TipoCambio      => 'Tipo definido para expresar el tipo de cambio. No se permiten valores negativos.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            TdCFDIEnum::T_CURP            => BaseEnum::XS_STRING,
            TdCFDIEnum::T_Importe         => BaseEnum::XS_DECIMAL,
            TdCFDIEnum::T_Fecha           => BaseEnum::XS_DATE,
            TdCFDIEnum::T_ImporteMXN      => BaseEnum::XS_DECIMAL,
            TdCFDIEnum::T_CuentaBancaria  => BaseEnum::XS_INTEGER,
            TdCFDIEnum::T_RFC             => BaseEnum::XS_STRING,
            TdCFDIEnum::T_RFC_PM          => BaseEnum::XS_STRING,
            TdCFDIEnum::T_RFC_PF          => BaseEnum::XS_STRING,
            TdCFDIEnum::T_FechaHora       => BaseEnum::XS_DATE_TIME,
            TdCFDIEnum::T_FechaH          => BaseEnum::XS_DATE_TIME,
            TdCFDIEnum::T_Descrip100      => BaseEnum::XS_STRING,
            TdCFDIEnum::T_NumeroDomicilio => BaseEnum::XS_STRING,
            TdCFDIEnum::T_Referencia      => BaseEnum::XS_STRING,
            TdCFDIEnum::T_Descrip120      => BaseEnum::XS_STRING,
            TdCFDIEnum::T_TipoCambio      => BaseEnum::XS_DECIMAL,
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            TdCFDIEnum::T_CURP            => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\LengthRule::class     => new Rules\LengthRule('18'),
                Rules\PatternRule::class    => new Rules\PatternRule('[A-Z][AEIOUX][A-Z]{2}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[MH]([ABCMTZ]S|[BCJMOT]C|[CNPST]L|[GNQ]T|[GQS]R|C[MH]|[MY]N|[DH]G|NE|VZ|DF|SP)[BCDFGHJ-NP-TV-Z]{3}[0-9A-Z][0-9]')
            ],
            TdCFDIEnum::T_Importe         => [
                Rules\FractionDigitsRule::class => new Rules\FractionDigitsRule('6'),
                Rules\MinInclusiveRule::class   => new Rules\MinInclusiveRule('0.000000'),
                Rules\PatternRule::class        => new Rules\PatternRule('[0-9]{1,18}(.[0-9]{1,6})?'),
                Rules\WhiteSpaceRule::class     => new Rules\WhiteSpaceRule('collapse')
            ],
            TdCFDIEnum::T_Fecha           => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('((19|20)[0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])'),
            ],
            TdCFDIEnum::T_ImporteMXN      => [
                Rules\FractionDigitsRule::class => new Rules\FractionDigitsRule('2'),
                Rules\MinInclusiveRule::class   => new Rules\MinInclusiveRule('0.00'),
                Rules\WhiteSpaceRule::class     => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class        => new Rules\PatternRule('[0-9]{1,18}(.[0-9]{1,2})?'),
            ],
            TdCFDIEnum::T_CuentaBancaria  => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('[0-9]{10,18}'),
            ],
            TdCFDIEnum::T_RFC             => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('12'),
                Rules\MaxLengthRule::class  => new Rules\MaxLengthRule('13'),
                Rules\PatternRule::class    => new Rules\PatternRule('[A-Z&amp;Ñ]{3,4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9A]'),
            ],
            TdCFDIEnum::T_RFC_PM          => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('12'),
                Rules\PatternRule::class    => new Rules\PatternRule('[A-Z&amp;Ñ]{3}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9A]'),
            ],
            TdCFDIEnum::T_RFC_PF          => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('13'),
                Rules\PatternRule::class    => new Rules\PatternRule('[A-Z&amp;Ñ]{4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9A]'),
            ],
            TdCFDIEnum::T_FechaHora       => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('((19|20)[0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])T(([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9])'),
            ],
            TdCFDIEnum::T_FechaH          => [
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('(20[1-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])T(([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9])'),
            ],
            TdCFDIEnum::T_Descrip100      => [
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('1'),
                Rules\MaxLengthRule::class  => new Rules\MaxLengthRule('100'),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('[^|]{1,100}'),
            ],
            TdCFDIEnum::T_NumeroDomicilio => [
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('1'),
                Rules\MaxLengthRule::class  => new Rules\MaxLengthRule('55'),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('[^|]{1,55}'),
            ],
            TdCFDIEnum::T_Referencia      => [
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('1'),
                Rules\MaxLengthRule::class  => new Rules\MaxLengthRule('250'),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('[^|]{1,250}'),
            ],
            TdCFDIEnum::T_Descrip120      => [
                Rules\MinLengthRule::class  => new Rules\MinLengthRule('1'),
                Rules\MaxLengthRule::class  => new Rules\MaxLengthRule('120'),
                Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class    => new Rules\PatternRule('[^|]{1,120}'),
            ],
            TdCFDIEnum::T_TipoCambio      => [
                Rules\MinInclusiveRule::class   => new Rules\MinInclusiveRule('0.00'),
                Rules\FractionDigitsRule::class => new Rules\FractionDigitsRule('6'),
                Rules\WhiteSpaceRule::class     => new Rules\WhiteSpaceRule('collapse'),
                Rules\PatternRule::class        => new Rules\PatternRule('[0-9]{1,18}(.[0-9]{1,6})?'),
            ],
        };
    }
}
