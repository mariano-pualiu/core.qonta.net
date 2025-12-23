<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos\OtroPago;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos as OtrosPagosModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleo as SubsidioAlEmpleoAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleoElement;
use MongoDB\Laravel\Relations\BelongsTo;

class SubsidioAlEmpleo extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'SubsidioAlEmpleo';

    protected static string $elementData = SubsidioAlEmpleoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'subsidio_al_empleo';

    protected $collection = 'sat_nomina_v12_subsidio_al_empleo';

    # Fillable

    protected $fillable = [
        'SubsidioCausado',
    ];

    # Casts

    protected $casts = [
        'SubsidioCausado' => SubsidioAlEmpleoAttributes\SubsidioCausadoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function otroPago(OtrosPagosModels\OtroPago $otroPago = null): BelongsTo
    {
        return $this->belongsTo(OtrosPagosModels\OtroPago::class);
    }

}
