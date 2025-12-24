<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33 as CfdiV33Models;
use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Emisor as EmisorAttributes;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\EmisorElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Emisor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Emisor';

    protected static string $elementData = EmisorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'emisor';

    protected $collection = 'sat_cfdi_v33_emisor';

    # Fillable

    protected $fillable = [
        'Rfc',
        'Nombre',
        'RegimenFiscal',
    ];

    # Casts

    protected $casts = [
        'Rfc' => EmisorAttributes\RfcAttribute::class,
        'Nombre' => EmisorAttributes\NombreAttribute::class,
        'RegimenFiscal' => EmisorAttributes\RegimenFiscalAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function comprobante(Cfdiv33Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(Cfdiv33Models\Comprobante::class);
    }

}
