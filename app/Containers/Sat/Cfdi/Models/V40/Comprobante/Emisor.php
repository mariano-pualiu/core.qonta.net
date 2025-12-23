<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Emisor as EmisorAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\EmisorElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Emisor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Emisor';

    protected static string $elementData = EmisorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'emisor';

    protected $collection = 'sat_cfdi_v40_emisor';

    # Fillable

    protected $fillable = [
        'Rfc',
        'Nombre',
        'RegimenFiscal',
        'FacAtrAdquirente',
    ];

    # Casts

    protected $casts = [
        'Rfc' => EmisorAttributes\RfcAttribute::class,
        'Nombre' => EmisorAttributes\NombreAttribute::class,
        'RegimenFiscal' => EmisorAttributes\RegimenFiscalAttribute::class,
        'FacAtrAdquirente' => EmisorAttributes\FacAtrAdquirenteAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function comprobante(Cfdiv40Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(Cfdiv40Models\Comprobante::class);
    }

}
