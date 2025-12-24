<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Impuestos as ImpuestosModels;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\ImpuestosElement;
use MongoDB\Laravel\Relations\HasOne;
use MongoDB\Laravel\Relations\BelongsTo;

class Impuestos extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Impuestos';

    protected static string $elementData = ImpuestosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'impuestos';

    protected $collection = 'sat_cfdi_v33_impuestos';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/3}Traslados' => ImpuestosModels\Traslados::class,
        '{http://www.sat.gob.mx/cfd/3}Retenciones' => ImpuestosModels\Retenciones::class,
    ];

    # Relationships

    final public function traslados(ImpuestosModels\Traslados $traslados = null): HasOne
    {
        return $this->hasOne(ImpuestosModels\Traslados::class);
    }

    final public function retenciones(ImpuestosModels\Retenciones $retenciones = null): HasOne
    {
        return $this->hasOne(ImpuestosModels\Retenciones::class);
    }

    final public function concepto(ConceptosModels\Concepto $concepto = null): BelongsTo
    {
        return $this->belongsTo(ConceptosModels\Concepto::class);
    }

}
