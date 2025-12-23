<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos as ImpuestosModels;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos as ImpuestosAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ImpuestosElement;
use MongoDB\Laravel\Relations\HasOne;
use MongoDB\Laravel\Relations\BelongsTo;

class Impuestos extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Impuestos';

    protected static string $elementData = ImpuestosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'impuestos';

    protected $collection = 'sat_cfdi_v40_impuestos';

    # Fillable

    protected $fillable = [
        'TotalImpuestosRetenidos',
        'TotalImpuestosTrasladados',
    ];

    # Casts

    protected $casts = [
        'TotalImpuestosRetenidos' => ImpuestosAttributes\TotalImpuestosRetenidosAttribute::class,
        'TotalImpuestosTrasladados' => ImpuestosAttributes\TotalImpuestosTrasladadosAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/4}Retenciones' => ImpuestosModels\Retenciones::class,
        '{http://www.sat.gob.mx/cfd/4}Traslados' => ImpuestosModels\Traslados::class,
    ];

    # Relationships

    final public function retenciones(ImpuestosModels\Retenciones $retenciones = null): HasOne
    {
        return $this->hasOne(ImpuestosModels\Retenciones::class);
    }

    final public function traslados(ImpuestosModels\Traslados $traslados = null): HasOne
    {
        return $this->hasOne(ImpuestosModels\Traslados::class);
    }

    final public function comprobante(Cfdiv40Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(Cfdiv40Models\Comprobante::class);
    }

}
