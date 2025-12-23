<?php

namespace App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor;

use App\Containers\Sat\Nomina\Enums\V12\Nomina\ReceptorEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\Enums\Values\UseEnum;
use Architecture\XmlSchemator\Analyzer\Attributes\AttributeData;

/**
 * "Atributo opcional para expresar la retribución otorgada al trabajador, que se integra por los pagos hechos en efectivo por cuota diaria, gratificaciones, percepciones, alimentación, habitación, primas, comisiones, prestaciones en especie y cualquiera otra cantidad o prestación que se entregue al trabajador por su trabajo, sin considerar los conceptos que se excluyen de conformidad con el Artículo 27 de la Ley del Seguro Social, o la integración de los pagos conforme la normatividad del Instituto de Seguridad Social del trabajador. (Se emplea para pagar las cuotas y aportaciones de Seguridad Social). Se debe ingresar cuando se esté obligado conforme a otras disposiciones distintas a las fiscales."
 */
class SalarioBaseCotAporAttribute extends AttributeData
{
    const FIXED = null;

    const NAME = 'SalarioBaseCotApor';

    const USE = UseEnum::OPTIONAL;

    const TYPE = ReceptorEnum::SalarioBaseCotApor;
}
