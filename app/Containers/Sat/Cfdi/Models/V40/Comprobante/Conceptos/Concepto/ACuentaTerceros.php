<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\ACuentaTerceros as ACuentaTercerosAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\ACuentaTercerosElement;
use MongoDB\Laravel\Relations\BelongsTo;

class ACuentaTerceros extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'ACuentaTerceros';

    protected static string $elementData = ACuentaTercerosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'a_cuenta_terceros';

    protected $collection = 'sat_cfdi_v40_a_cuenta_terceros';

    # Fillable

    protected $fillable = [
        'RfcACuentaTerceros',
        'NombreACuentaTerceros',
        'RegimenFiscalACuentaTerceros',
        'DomicilioFiscalACuentaTerceros',
    ];

    # Casts

    protected $casts = [
        'RfcACuentaTerceros' => ACuentaTercerosAttributes\RfcACuentaTercerosAttribute::class,
        'NombreACuentaTerceros' => ACuentaTercerosAttributes\NombreACuentaTercerosAttribute::class,
        'RegimenFiscalACuentaTerceros' => ACuentaTercerosAttributes\RegimenFiscalACuentaTercerosAttribute::class,
        'DomicilioFiscalACuentaTerceros' => ACuentaTercerosAttributes\DomicilioFiscalACuentaTercerosAttribute::class,
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
