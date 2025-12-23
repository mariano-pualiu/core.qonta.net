<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Impuestos;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Impuestos\Traslados as TrasladosModels;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto as ConceptoModels;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Impuestos\TrasladosElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Traslados extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Traslados';

    protected static string $elementData = TrasladosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'traslados';

    protected $collection = 'sat_cfdi_v40_traslados';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/4}Traslado' => TrasladosModels\Traslado::class,
    ];

    # Relationships

    final public function traslado(TrasladosModels\Traslado $traslado = null): EmbedsMany
    {
        return $this->embedsMany(TrasladosModels\Traslado::class);
    }

    final public function impuestos(ConceptoModels\Impuestos $impuestos = null): BelongsTo
    {
        return $this->belongsTo(ConceptoModels\Impuestos::class);
    }

}
