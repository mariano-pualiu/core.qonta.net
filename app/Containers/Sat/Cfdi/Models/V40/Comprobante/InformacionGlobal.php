<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\InformacionGlobal as InformacionGlobalAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\InformacionGlobalElement;
use MongoDB\Laravel\Relations\BelongsTo;

class InformacionGlobal extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'InformacionGlobal';

    protected static string $elementData = InformacionGlobalElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'informacion_global';

    protected $collection = 'sat_cfdi_v40_informacion_global';

    # Fillable

    protected $fillable = [
        'Periodicidad',
        'Meses',
        'Año',
    ];

    # Casts

    protected $casts = [
        'Periodicidad' => InformacionGlobalAttributes\PeriodicidadAttribute::class,
        'Meses' => InformacionGlobalAttributes\MesesAttribute::class,
        'Año' => InformacionGlobalAttributes\AñoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function comprobante(Cfdiv40Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(Cfdiv40Models\Comprobante::class);
    }

}
