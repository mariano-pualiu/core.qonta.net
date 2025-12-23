<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\SeparacionIndemnizacion as SeparacionIndemnizacionAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\SeparacionIndemnizacionElement;
use MongoDB\Laravel\Relations\BelongsTo;

class SeparacionIndemnizacion extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'SeparacionIndemnizacion';

    protected static string $elementData = SeparacionIndemnizacionElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'separacion_indemnizacion';

    protected $collection = 'sat_nomina_v12_separacion_indemnizacion';

    # Fillable

    protected $fillable = [
        'TotalPagado',
        'NumAñosServicio',
        'UltimoSueldoMensOrd',
        'IngresoAcumulable',
        'IngresoNoAcumulable',
    ];

    # Casts

    protected $casts = [
        'TotalPagado' => SeparacionIndemnizacionAttributes\TotalPagadoAttribute::class,
        'NumAñosServicio' => SeparacionIndemnizacionAttributes\NumAñosServicioAttribute::class,
        'UltimoSueldoMensOrd' => SeparacionIndemnizacionAttributes\UltimoSueldoMensOrdAttribute::class,
        'IngresoAcumulable' => SeparacionIndemnizacionAttributes\IngresoAcumulableAttribute::class,
        'IngresoNoAcumulable' => SeparacionIndemnizacionAttributes\IngresoNoAcumulableAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function percepciones(NominaModels\Percepciones $percepciones = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\Percepciones::class);
    }

}
