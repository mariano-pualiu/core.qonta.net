<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\JubilacionPensionRetiro as JubilacionPensionRetiroAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\JubilacionPensionRetiroElement;
use MongoDB\Laravel\Relations\BelongsTo;

class JubilacionPensionRetiro extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'JubilacionPensionRetiro';

    protected static string $elementData = JubilacionPensionRetiroElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'jubilacion_pension_retiro';

    protected $collection = 'sat_nomina_v12_jubilacion_pension_retiro';

    # Fillable

    protected $fillable = [
        'TotalUnaExhibicion',
        'TotalParcialidad',
        'MontoDiario',
        'IngresoAcumulable',
        'IngresoNoAcumulable',
    ];

    # Casts

    protected $casts = [
        'TotalUnaExhibicion' => JubilacionPensionRetiroAttributes\TotalUnaExhibicionAttribute::class,
        'TotalParcialidad' => JubilacionPensionRetiroAttributes\TotalParcialidadAttribute::class,
        'MontoDiario' => JubilacionPensionRetiroAttributes\MontoDiarioAttribute::class,
        'IngresoAcumulable' => JubilacionPensionRetiroAttributes\IngresoAcumulableAttribute::class,
        'IngresoNoAcumulable' => JubilacionPensionRetiroAttributes\IngresoNoAcumulableAttribute::class,
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
