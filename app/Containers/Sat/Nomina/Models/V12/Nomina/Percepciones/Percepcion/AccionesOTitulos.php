<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones\Percepcion;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones as PercepcionesModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\AccionesOTitulos as AccionesOTitulosAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\Percepcion\AccionesOTitulosElement;
use MongoDB\Laravel\Relations\BelongsTo;

class AccionesOTitulos extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'AccionesOTitulos';

    protected static string $elementData = AccionesOTitulosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'acciones_o_titulos';

    protected $collection = 'sat_nomina_v12_acciones_o_titulos';

    # Fillable

    protected $fillable = [
        'ValorMercado',
        'PrecioAlOtorgarse',
    ];

    # Casts

    protected $casts = [
        'ValorMercado' => AccionesOTitulosAttributes\ValorMercadoAttribute::class,
        'PrecioAlOtorgarse' => AccionesOTitulosAttributes\PrecioAlOtorgarseAttribute::class,
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
