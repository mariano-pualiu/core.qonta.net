<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\CfdiRelacionados as CfdiRelacionadosModels;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\CfdiRelacionados as CfdiRelacionadosAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\CfdiRelacionadosElement;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\BelongsTo;

class CfdiRelacionados extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'CfdiRelacionados';

    protected static string $elementData = CfdiRelacionadosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'cfdi_relacionados';

    protected $collection = 'sat_cfdi_v40_cfdi_relacionados';

    # Fillable

    protected $fillable = [
        'TipoRelacion',
    ];

    # Casts

    protected $casts = [
        'TipoRelacion' => CfdiRelacionadosAttributes\TipoRelacionAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/4}CfdiRelacionado' => CfdiRelacionadosModels\CfdiRelacionado::class,
    ];

    # Relationships

    final public function cfdiRelacionado(CfdiRelacionadosModels\CfdiRelacionado $cfdiRelacionado = null): EmbedsMany
    {
        return $this->embedsMany(CfdiRelacionadosModels\CfdiRelacionado::class);
    }

    final public function comprobante(Cfdiv40Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(Cfdiv40Models\Comprobante::class);
    }

}
