<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\CfdiRelacionados;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante as ComprobanteModels;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\CfdiRelacionados\CfdiRelacionado as CfdiRelacionadoAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\CfdiRelacionados\CfdiRelacionadoElement;
use MongoDB\Laravel\Relations\BelongsTo;

class CfdiRelacionado extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'CfdiRelacionado';

    protected static string $elementData = CfdiRelacionadoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'cfdi_relacionado';

    protected $collection = 'sat_cfdi_v40_cfdi_relacionado';

    # Fillable

    protected $fillable = [
        'UUID',
    ];

    # Casts

    protected $casts = [
        'UUID' => CfdiRelacionadoAttributes\UUIDAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function cfdiRelacionados(ComprobanteModels\CfdiRelacionados $cfdiRelacionados = null): BelongsTo
    {
        return $this->belongsTo(ComprobanteModels\CfdiRelacionados::class);
    }

}
