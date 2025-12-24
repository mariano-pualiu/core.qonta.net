<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones\Percepcion as PercepcionModels;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion as PercepcionAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\PercepcionElement;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Percepcion extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Percepcion';

    protected static string $elementData = PercepcionElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'percepcion';

    protected $collection = 'sat_nomina_v12_percepcion';

    # Fillable

    protected $fillable = [
        'TipoPercepcion',
        'Clave',
        'Concepto',
        'ImporteGravado',
        'ImporteExento',
    ];

    # Casts

    protected $casts = [
        'TipoPercepcion' => PercepcionAttributes\TipoPercepcionAttribute::class,
        'Clave' => PercepcionAttributes\ClaveAttribute::class,
        'Concepto' => PercepcionAttributes\ConceptoAttribute::class,
        'ImporteGravado' => PercepcionAttributes\ImporteGravadoAttribute::class,
        'ImporteExento' => PercepcionAttributes\ImporteExentoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}AccionesOTitulos' => PercepcionModels\AccionesOTitulos::class,
        '{http://www.sat.gob.mx/nomina12}HorasExtra' => PercepcionModels\HorasExtra::class,
    ];

    # Relationships

    final public function accionesOTitulos(PercepcionModels\AccionesOTitulos $accionesOTitulos = null): EmbedsOne
    {
        return $this->embedsOne(PercepcionModels\AccionesOTitulos::class);
    }

    final public function horasExtra(PercepcionModels\HorasExtra $horasExtra = null): HasMany
    {
        return $this->hasMany(PercepcionModels\HorasExtra::class);
    }

    final public function percepciones(NominaModels\Percepciones $percepciones = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\Percepciones::class);
    }

}
