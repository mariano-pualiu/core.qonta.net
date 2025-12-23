<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos\Traslados as TrasladosModels;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante as ComprobanteModels;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos\TrasladosElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Traslados extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Traslados';

    protected static string $elementData = TrasladosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'traslados';

    protected $collection = 'sat_cfdi_v33_traslados';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/3}Traslado' => TrasladosModels\Traslado::class,
    ];

    # Relationships

    final public function traslado(TrasladosModels\Traslado $traslado = null): EmbedsMany
    {
        return $this->embedsMany(TrasladosModels\Traslado::class);
    }

    final public function impuestos(ComprobanteModels\Impuestos $impuestos = null): BelongsTo
    {
        return $this->belongsTo(ComprobanteModels\Impuestos::class);
    }

}
