<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\InformacionAduanera as InformacionAduaneraAttributes;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\InformacionAduaneraElement;
use MongoDB\Laravel\Relations\BelongsTo;

class InformacionAduanera extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'InformacionAduanera';

    protected static string $elementData = InformacionAduaneraElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'informacion_aduanera';

    protected $collection = 'sat_cfdi_v33_informacion_aduanera';

    # Fillable

    protected $fillable = [
        'NumeroPedimento',
    ];

    # Casts

    protected $casts = [
        'NumeroPedimento' => InformacionAduaneraAttributes\NumeroPedimentoAttribute::class,
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
