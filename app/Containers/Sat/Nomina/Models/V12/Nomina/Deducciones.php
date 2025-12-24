<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Deducciones as DeduccionesModels;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones as DeduccionesAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\DeduccionesElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Deducciones extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Deducciones';

    protected static string $elementData = DeduccionesElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'deducciones';

    protected $collection = 'sat_nomina_v12_deducciones';

    # Fillable

    protected $fillable = [
        'TotalOtrasDeducciones',
        'TotalImpuestosRetenidos',
    ];

    # Casts

    protected $casts = [
        'TotalOtrasDeducciones' => DeduccionesAttributes\TotalOtrasDeduccionesAttribute::class,
        'TotalImpuestosRetenidos' => DeduccionesAttributes\TotalImpuestosRetenidosAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}Deduccion' => DeduccionesModels\Deduccion::class,
    ];

    # Relationships

    final public function deduccion(DeduccionesModels\Deduccion $deduccion = null): EmbedsMany
    {
        return $this->embedsMany(DeduccionesModels\Deduccion::class);
    }

    final public function nomina(Nominav12Models\Nomina $nomina = null): BelongsTo
    {
        return $this->belongsTo(Nominav12Models\Nomina::class);
    }

}
