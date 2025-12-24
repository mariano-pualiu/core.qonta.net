<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos\Retenciones as RetencionesModels;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante as ComprobanteModels;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos\RetencionesElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Retenciones extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Retenciones';

    protected static string $elementData = RetencionesElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'retenciones';

    protected $collection = 'sat_cfdi_v33_retenciones';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/3}Retencion' => RetencionesModels\Retencion::class,
    ];

    # Relationships

    final public function retencion(RetencionesModels\Retencion $retencion = null): EmbedsMany
    {
        return $this->embedsMany(RetencionesModels\Retencion::class);
    }

    final public function impuestos(ComprobanteModels\Impuestos $impuestos = null): BelongsTo
    {
        return $this->belongsTo(ComprobanteModels\Impuestos::class);
    }

}
