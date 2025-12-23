<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\ComplementoConceptoElement;
use MongoDB\Laravel\Relations\BelongsTo;

class ComplementoConcepto extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'ComplementoConcepto';

    protected static string $elementData = ComplementoConceptoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'complemento_concepto';

    protected $collection = 'sat_cfdi_v33_complemento_concepto';

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

    final public function concepto(ConceptosModels\Concepto $concepto = null): BelongsTo
    {
        return $this->belongsTo(ConceptosModels\Concepto::class);
    }

}
