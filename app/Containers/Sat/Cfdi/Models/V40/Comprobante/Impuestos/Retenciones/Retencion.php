<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos\Retenciones;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos as ImpuestosModels;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Retenciones\Retencion as RetencionAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Impuestos\Retenciones\RetencionElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Retencion extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Retencion';

    protected static string $elementData = RetencionElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'retencion';

    protected $collection = 'sat_cfdi_v40_retencion';

    # Fillable

    protected $fillable = [
        'Impuesto',
        'Importe',
    ];

    # Casts

    protected $casts = [
        'Impuesto' => RetencionAttributes\ImpuestoAttribute::class,
        'Importe' => RetencionAttributes\ImporteAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function retenciones(ImpuestosModels\Retenciones $retenciones = null): BelongsTo
    {
        return $this->belongsTo(ImpuestosModels\Retenciones::class);
    }

}
