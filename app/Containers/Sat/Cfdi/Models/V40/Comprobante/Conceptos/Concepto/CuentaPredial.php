<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\CuentaPredial as CuentaPredialAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\CuentaPredialElement;
use MongoDB\Laravel\Relations\BelongsTo;

class CuentaPredial extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'CuentaPredial';

    protected static string $elementData = CuentaPredialElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'cuenta_predial';

    protected $collection = 'sat_cfdi_v40_cuenta_predial';

    # Fillable

    protected $fillable = [
        'Numero',
    ];

    # Casts

    protected $casts = [
        'Numero' => CuentaPredialAttributes\NumeroAttribute::class,
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
