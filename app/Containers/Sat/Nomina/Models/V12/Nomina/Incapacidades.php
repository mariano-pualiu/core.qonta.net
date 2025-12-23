<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Incapacidades as IncapacidadesModels;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\IncapacidadesElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Incapacidades extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Incapacidades';

    protected static string $elementData = IncapacidadesElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'incapacidades';

    protected $collection = 'sat_nomina_v12_incapacidades';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}Incapacidad' => IncapacidadesModels\Incapacidad::class,
    ];

    # Relationships

    final public function incapacidad(IncapacidadesModels\Incapacidad $incapacidad = null): EmbedsMany
    {
        return $this->embedsMany(IncapacidadesModels\Incapacidad::class);
    }

    final public function nomina(Nominav12Models\Nomina $nomina = null): BelongsTo
    {
        return $this->belongsTo(Nominav12Models\Nomina::class);
    }

}
