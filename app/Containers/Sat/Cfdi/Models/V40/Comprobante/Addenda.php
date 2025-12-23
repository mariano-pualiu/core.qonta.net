<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\AddendaElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Addenda extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Addenda';

    protected static string $elementData = AddendaElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'addenda';

    protected $collection = 'sat_cfdi_v40_addenda';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
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
