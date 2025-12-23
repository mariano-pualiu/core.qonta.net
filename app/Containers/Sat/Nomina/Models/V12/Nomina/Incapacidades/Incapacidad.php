<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Incapacidades;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad as IncapacidadAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Incapacidades\IncapacidadElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Incapacidad extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Incapacidad';

    protected static string $elementData = IncapacidadElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'incapacidad';

    protected $collection = 'sat_nomina_v12_incapacidad';

    # Fillable

    protected $fillable = [
        'DiasIncapacidad',
        'TipoIncapacidad',
        'ImporteMonetario',
    ];

    # Casts

    protected $casts = [
        'DiasIncapacidad' => IncapacidadAttributes\DiasIncapacidadAttribute::class,
        'TipoIncapacidad' => IncapacidadAttributes\TipoIncapacidadAttribute::class,
        'ImporteMonetario' => IncapacidadAttributes\ImporteMonetarioAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function incapacidades(NominaModels\Incapacidades $incapacidades = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\Incapacidades::class);
    }

}
