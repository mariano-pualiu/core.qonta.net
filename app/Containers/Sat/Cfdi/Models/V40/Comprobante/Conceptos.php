<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ConceptosElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Conceptos extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Conceptos';

    protected static string $elementData = ConceptosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'conceptos';

    protected $collection = 'sat_cfdi_v40_conceptos';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/4}Concepto' => ConceptosModels\Concepto::class,
    ];

    # Relationships

    final public function concepto(ConceptosModels\Concepto $concepto = null): EmbedsMany
    {
        return $this->embedsMany(ConceptosModels\Concepto::class);
    }

    final public function comprobante(Cfdiv40Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(Cfdiv40Models\Comprobante::class);
    }

}
