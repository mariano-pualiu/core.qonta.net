<?php

namespace App\Containers\Sat\Nomina\Enums\V12\Nomina;

use ArchTech\Enums\Options;
use Architecture\XmlSchemator\Analyzer\Common\Collections\RestrictionRulesCollection;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Types;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzer\Common\Enums\Contracts;
use Architecture\XmlSchemator\Analyzer\Common\Rules as CommonRules;

enum ReceptorEnum: string implements Contracts\SimpleTypeEnumContract
{
    use Options;

    # Cases

    case Curp                            = 'Curp';
    case NumSeguridadSocial              = 'NumSeguridadSocial';
    case FechaInicioRelLaboral           = 'FechaInicioRelLaboral';
    case Antigüedad                      = 'Antigüedad';
    case TipoContrato                    = 'TipoContrato';
    case Sindicalizado                   = 'Sindicalizado';
    case TipoJornada                     = 'TipoJornada';
    case TipoRegimen                     = 'TipoRegimen';
    case NumEmpleado                     = 'NumEmpleado';
    case Departamento                    = 'Departamento';
    case Puesto                          = 'Puesto';
    case RiesgoPuesto                    = 'RiesgoPuesto';
    case PeriodicidadPago                = 'PeriodicidadPago';
    case Banco                           = 'Banco';
    case CuentaBancaria                  = 'CuentaBancaria';
    case SalarioBaseCotApor              = 'SalarioBaseCotApor';
    case SalarioDiarioIntegrado          = 'SalarioDiarioIntegrado';
    case ClaveEntFed                     = 'ClaveEntFed';

    public function annotation(): string
    {
        return match($this)
        {
            ReceptorEnum::Curp                   => 'Atributo requerido para expresar la CURP del receptor del comprobante de nómina.',
            ReceptorEnum::NumSeguridadSocial     => 'Atributo condicional para expresar el número de seguridad social del trabajador. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::FechaInicioRelLaboral  => 'Atributo condicional para expresar la fecha de inicio de la relación laboral entre el empleador y el empleado. Se expresa en la forma AAAA-MM-DD, de acuerdo con la especificación ISO 8601. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::Antigüedad             => 'Atributo condicional para expresar el número de semanas o el periodo de años, meses y días que el empleado ha mantenido relación laboral con el empleador. Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::TipoContrato           => 'Atributo requerido para expresar el tipo de contrato que tiene el trabajador.',
            ReceptorEnum::Sindicalizado          => 'Atributo opcional para indicar si el trabajador está asociado a un sindicato. Si se omite se asume que no está asociado a algún sindicato.',
            ReceptorEnum::TipoJornada            => 'Atributo condicional para expresar el tipo de jornada que cubre el trabajador. Se debe ingresar cuando se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::TipoRegimen            => 'Atributo requerido para la expresión de la clave del régimen por el cual se tiene contratado al trabajador.',
            ReceptorEnum::NumEmpleado            => 'Atributo requerido para expresar el número de empleado de 1 a 15 posiciones.',
            ReceptorEnum::Departamento           => 'Atributo opcional para la expresión del departamento o área a la que pertenece el trabajador.',
            ReceptorEnum::Puesto                 => 'Atributo opcional para la expresión del puesto asignado al empleado o actividad que realiza.',
            ReceptorEnum::RiesgoPuesto           => 'Atributo opcional para expresar la clave conforme a la Clase en que deben inscribirse los patrones, de acuerdo con las actividades que desempeñan sus trabajadores, según lo previsto en el artículo 196 del Reglamento en Materia de Afiliación Clasificación de Empresas, Recaudación y Fiscalización, o conforme con la normatividad del Instituto de Seguridad Social del trabajador.  Se debe ingresar cuando se cuente con él, o se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::PeriodicidadPago       => 'Atributo requerido para la forma en que se establece el pago del salario.',
            ReceptorEnum::Banco                  => 'Atributo condicional para la expresión de la clave del Banco conforme al catálogo, donde se realiza el depósito de nómina.',
            ReceptorEnum::CuentaBancaria         => 'Atributo condicional para la expresión de la cuenta bancaria a 11 posiciones o número de teléfono celular a 10 posiciones o número de tarjeta de crédito, débito o servicios a 15 ó 16 posiciones o la CLABE a 18 posiciones o número de monedero electrónico, donde se realiza el depósito de nómina.',
            ReceptorEnum::SalarioBaseCotApor     => 'Atributo opcional para expresar la retribución otorgada al trabajador, que se integra por los pagos hechos en efectivo por cuota diaria, gratificaciones, percepciones, alimentación, habitación, primas, comisiones, prestaciones en especie y cualquiera otra cantidad o prestación que se entregue al trabajador por su trabajo, sin considerar los conceptos que se excluyen de conformidad con el Artículo 27 de la Ley del Seguro Social, o la integración de los pagos conforme la normatividad del Instituto de Seguridad Social del trabajador. (Se emplea para pagar las cuotas y aportaciones de Seguridad Social). Se debe ingresar cuando se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::SalarioDiarioIntegrado => 'Atributo opcional para expresar el salario que se integra con los pagos hechos en efectivo por cuota diaria, gratificaciones, percepciones, habitación, primas, comisiones, prestaciones en especie y cualquier otra cantidad o prestación que se entregue al trabajador por su trabajo, de conformidad con el Art. 84 de la Ley Federal del Trabajo. (Se utiliza para el cálculo de las indemnizaciones). Se debe ingresar cuando se esté obligado conforme a otras disposiciones distintas a las fiscales.',
            ReceptorEnum::ClaveEntFed            => 'Atributo requerido para expresar la clave de la entidad federativa en donde el receptor del recibo prestó el servicio.',
        };
    }

    public function base(): BaseEnum
    {
        return match($this)
        {
            ReceptorEnum::Curp                   => Types\TdCFDIEnum::T_CURP->base(),
            ReceptorEnum::NumSeguridadSocial     => BaseEnum::XS_STRING,
            ReceptorEnum::FechaInicioRelLaboral  => Types\TdCFDIEnum::T_Fecha->base(),
            ReceptorEnum::Antigüedad             => BaseEnum::XS_STRING,
            ReceptorEnum::TipoContrato           => Types\CatNominaEnum::C_TipoContrato->base(),
            ReceptorEnum::Sindicalizado          => BaseEnum::XS_STRING,
            ReceptorEnum::TipoJornada            => Types\CatNominaEnum::C_TipoJornada->base(),
            ReceptorEnum::TipoRegimen            => Types\CatNominaEnum::C_TipoRegimen->base(),
            ReceptorEnum::NumEmpleado            => BaseEnum::XS_STRING,
            ReceptorEnum::Departamento           => BaseEnum::XS_STRING,
            ReceptorEnum::Puesto                 => BaseEnum::XS_STRING,
            ReceptorEnum::RiesgoPuesto           => Types\CatNominaEnum::C_RiesgoPuesto->base(),
            ReceptorEnum::PeriodicidadPago       => Types\CatNominaEnum::C_PeriodicidadPago->base(),
            ReceptorEnum::Banco                  => Types\CatNominaEnum::C_Banco->base(),
            ReceptorEnum::CuentaBancaria         => Types\TdCFDIEnum::T_CuentaBancaria->base(),
            ReceptorEnum::SalarioBaseCotApor     => Types\TdCFDIEnum::T_ImporteMXN->base(),
            ReceptorEnum::SalarioDiarioIntegrado => Types\TdCFDIEnum::T_ImporteMXN->base(),
            ReceptorEnum::ClaveEntFed            => Types\CatCFDIEnum::C_Estado->base(),
        };
    }

    public function restrictionRules(): array
    {
        return match($this)
        {
            ReceptorEnum::Curp                   => Types\TdCFDIEnum::T_CURP->restrictionRules(),
            ReceptorEnum::NumSeguridadSocial     => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('15'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[0-9]{1,15}'),
            ],
            ReceptorEnum::FechaInicioRelLaboral  => Types\TdCFDIEnum::T_Fecha->restrictionRules(),
            ReceptorEnum::Antigüedad             => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('P(([1-9][0-9]{0,3})|0)W|P([1-9][0-9]?Y)?(([1-9]|1[012])M)?(0|[1-9]|[12][0-9]|3[01])D'),
            ],
            ReceptorEnum::TipoContrato           => Types\CatNominaEnum::C_TipoContrato->restrictionRules(),
            ReceptorEnum::Sindicalizado          => [
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\EnumerationRule::class => new CommonRules\EnumerationRule(['No']),
            ],
            ReceptorEnum::TipoJornada            => Types\CatNominaEnum::C_TipoJornada->restrictionRules(),
            ReceptorEnum::TipoRegimen            => Types\CatNominaEnum::C_TipoRegimen->restrictionRules(),
            ReceptorEnum::NumEmpleado            => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('15'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,15}'),
            ],
            ReceptorEnum::Departamento           => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            ReceptorEnum::Puesto                 => [
                CommonRules\MinLengthRule::class => new CommonRules\MinLengthRule('1'),
                CommonRules\MaxLengthRule::class => new CommonRules\MaxLengthRule('100'),
                CommonRules\WhiteSpaceRule::class => new CommonRules\WhiteSpaceRule('collapse'),
                CommonRules\PatternRule::class => new CommonRules\PatternRule('[^|]{1,100}'),
            ],
            ReceptorEnum::RiesgoPuesto           => Types\CatNominaEnum::C_RiesgoPuesto->restrictionRules(),
            ReceptorEnum::PeriodicidadPago       => Types\CatNominaEnum::C_PeriodicidadPago->restrictionRules(),
            ReceptorEnum::Banco                  => Types\CatNominaEnum::C_Banco->restrictionRules(),
            ReceptorEnum::CuentaBancaria         => Types\TdCFDIEnum::T_CuentaBancaria->restrictionRules(),
            ReceptorEnum::SalarioBaseCotApor     => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            ReceptorEnum::SalarioDiarioIntegrado => Types\TdCFDIEnum::T_ImporteMXN->restrictionRules(),
            ReceptorEnum::ClaveEntFed            => Types\CatCFDIEnum::C_Estado->restrictionRules(),
        };
    }
}
