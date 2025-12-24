<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos\OtroPago as OtroPagoModels;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago as OtroPagoAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPagoElement;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\BelongsTo;

class OtroPago extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'OtroPago';

    protected static string $elementData = OtroPagoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'otro_pago';

    protected $collection = 'sat_nomina_v12_otro_pago';

    # Fillable

    protected $fillable = [
        'TipoOtroPago',
        'Clave',
        'Concepto',
        'Importe',
    ];

    # Casts

    protected $casts = [
        'TipoOtroPago' => OtroPagoAttributes\TipoOtroPagoAttribute::class,
        'Clave' => OtroPagoAttributes\ClaveAttribute::class,
        'Concepto' => OtroPagoAttributes\ConceptoAttribute::class,
        'Importe' => OtroPagoAttributes\ImporteAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}SubsidioAlEmpleo' => OtroPagoModels\SubsidioAlEmpleo::class,
        '{http://www.sat.gob.mx/nomina12}CompensacionSaldosAFavor' => OtroPagoModels\CompensacionSaldosAFavor::class,
    ];

    # Relationships

    final public function subsidioAlEmpleo(OtroPagoModels\SubsidioAlEmpleo $subsidioAlEmpleo = null): EmbedsOne
    {
        return $this->embedsOne(OtroPagoModels\SubsidioAlEmpleo::class);
    }

    final public function compensacionSaldosAFavor(OtroPagoModels\CompensacionSaldosAFavor $compensacionSaldosAFavor = null): EmbedsOne
    {
        return $this->embedsOne(OtroPagoModels\CompensacionSaldosAFavor::class);
    }

    final public function otrosPagos(NominaModels\OtrosPagos $otrosPagos = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\OtrosPagos::class);
    }

}
