<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones as PercepcionesModels;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones as PercepcionesAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\PercepcionesElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\BelongsTo;

class Percepciones extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Percepciones';

    protected static string $elementData = PercepcionesElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'percepciones';

    protected $collection = 'sat_nomina_v12_percepciones';

    # Fillable

    protected $fillable = [
        'TotalSueldos',
        'TotalSeparacionIndemnizacion',
        'TotalJubilacionPensionRetiro',
        'TotalGravado',
        'TotalExento',
    ];

    # Casts

    protected $casts = [
        'TotalSueldos' => PercepcionesAttributes\TotalSueldosAttribute::class,
        'TotalSeparacionIndemnizacion' => PercepcionesAttributes\TotalSeparacionIndemnizacionAttribute::class,
        'TotalJubilacionPensionRetiro' => PercepcionesAttributes\TotalJubilacionPensionRetiroAttribute::class,
        'TotalGravado' => PercepcionesAttributes\TotalGravadoAttribute::class,
        'TotalExento' => PercepcionesAttributes\TotalExentoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}Percepcion' => PercepcionesModels\Percepcion::class,
        '{http://www.sat.gob.mx/nomina12}JubilacionPensionRetiro' => PercepcionesModels\JubilacionPensionRetiro::class,
        '{http://www.sat.gob.mx/nomina12}SeparacionIndemnizacion' => PercepcionesModels\SeparacionIndemnizacion::class,
    ];

    # Relationships

    final public function percepcion(PercepcionesModels\Percepcion $percepcion = null): EmbedsMany
    {
        return $this->embedsMany(PercepcionesModels\Percepcion::class);
    }

    final public function jubilacionPensionRetiro(PercepcionesModels\JubilacionPensionRetiro $jubilacionPensionRetiro = null): EmbedsOne
    {
        return $this->embedsOne(PercepcionesModels\JubilacionPensionRetiro::class);
    }

    final public function separacionIndemnizacion(PercepcionesModels\SeparacionIndemnizacion $separacionIndemnizacion = null): EmbedsOne
    {
        return $this->embedsOne(PercepcionesModels\SeparacionIndemnizacion::class);
    }

    final public function nomina(Nominav12Models\Nomina $nomina = null): BelongsTo
    {
        return $this->belongsTo(Nominav12Models\Nomina::class);
    }

}
