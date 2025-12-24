<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Parte;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto as ConceptoModels;
use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Parte\InformacionAduanera as InformacionAduaneraAttributes;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\Parte\InformacionAduaneraElement;
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

    final public function parte(ConceptoModels\Parte $parte = null): BelongsTo
    {
        return $this->belongsTo(ConceptoModels\Parte::class);
    }

}
