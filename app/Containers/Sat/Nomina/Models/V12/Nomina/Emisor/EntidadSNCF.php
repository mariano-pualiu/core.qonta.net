<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Emisor;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor\EntidadSNCF as EntidadSNCFAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Emisor\EntidadSNCFElement;
use MongoDB\Laravel\Relations\BelongsTo;

class EntidadSNCF extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'EntidadSNCF';

    protected static string $elementData = EntidadSNCFElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'entidad_s_n_c_f';

    protected $collection = 'sat_nomina_v12_entidad_s_n_c_f';

    # Fillable

    protected $fillable = [
        'OrigenRecurso',
        'MontoRecursoPropio',
    ];

    # Casts

    protected $casts = [
        'OrigenRecurso' => EntidadSNCFAttributes\OrigenRecursoAttribute::class,
        'MontoRecursoPropio' => EntidadSNCFAttributes\MontoRecursoPropioAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function emisor(NominaModels\Emisor $emisor = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\Emisor::class);
    }

}
