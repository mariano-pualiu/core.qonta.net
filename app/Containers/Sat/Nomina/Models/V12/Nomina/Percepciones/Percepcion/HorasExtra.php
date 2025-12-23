<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones\Percepcion;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones as PercepcionesModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\HorasExtra as HorasExtraAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\Percepcion\HorasExtraElement;
use MongoDB\Laravel\Relations\BelongsTo;

class HorasExtra extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'HorasExtra';

    protected static string $elementData = HorasExtraElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'horas_extra';

    protected $collection = 'sat_nomina_v12_horas_extra';

    # Fillable

    protected $fillable = [
        'Dias',
        'TipoHoras',
        'HorasExtra',
        'ImportePagado',
    ];

    # Casts

    protected $casts = [
        'Dias' => HorasExtraAttributes\DiasAttribute::class,
        'TipoHoras' => HorasExtraAttributes\TipoHorasAttribute::class,
        'HorasExtra' => HorasExtraAttributes\HorasExtraAttribute::class,
        'ImportePagado' => HorasExtraAttributes\ImportePagadoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function percepcion(PercepcionesModels\Percepcion $percepcion = null): BelongsTo
    {
        return $this->belongsTo(PercepcionesModels\Percepcion::class);
    }

}
