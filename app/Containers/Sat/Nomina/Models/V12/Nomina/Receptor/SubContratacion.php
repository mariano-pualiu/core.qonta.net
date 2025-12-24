<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Receptor;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor\SubContratacion as SubContratacionAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Receptor\SubContratacionElement;
use MongoDB\Laravel\Relations\BelongsTo;

class SubContratacion extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'SubContratacion';

    protected static string $elementData = SubContratacionElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'sub_contratacion';

    protected $collection = 'sat_nomina_v12_sub_contratacion';

    # Fillable

    protected $fillable = [
        'RfcLabora',
        'PorcentajeTiempo',
    ];

    # Casts

    protected $casts = [
        'RfcLabora' => SubContratacionAttributes\RfcLaboraAttribute::class,
        'PorcentajeTiempo' => SubContratacionAttributes\PorcentajeTiempoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function receptor(NominaModels\Receptor $receptor = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\Receptor::class);
    }

}
