<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Impuestos\Traslados;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Impuestos as ImpuestosModels;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado as TrasladoAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Impuestos\Traslados\TrasladoElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Traslado extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Traslado';

    protected static string $elementData = TrasladoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'traslado';

    protected $collection = 'sat_cfdi_v40_traslado';

    # Fillable

    protected $fillable = [
        'Base',
        'Impuesto',
        'TipoFactor',
        'TasaOCuota',
        'Importe',
    ];

    # Casts

    protected $casts = [
        'Base' => TrasladoAttributes\BaseAttribute::class,
        'Impuesto' => TrasladoAttributes\ImpuestoAttribute::class,
        'TipoFactor' => TrasladoAttributes\TipoFactorAttribute::class,
        'TasaOCuota' => TrasladoAttributes\TasaOCuotaAttribute::class,
        'Importe' => TrasladoAttributes\ImporteAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function traslados(ImpuestosModels\Traslados $traslados = null): BelongsTo
    {
        return $this->belongsTo(ImpuestosModels\Traslados::class);
    }

}
