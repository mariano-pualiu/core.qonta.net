<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor as ReceptorAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ReceptorElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Receptor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Receptor';

    protected static string $elementData = ReceptorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'receptor';

    protected $collection = 'sat_cfdi_v40_receptor';

    # Fillable

    protected $fillable = [
        'Rfc',
        'Nombre',
        'DomicilioFiscalReceptor',
        'ResidenciaFiscal',
        'NumRegIdTrib',
        'RegimenFiscalReceptor',
        'UsoCFDI',
    ];

    # Casts

    protected $casts = [
        'Rfc' => ReceptorAttributes\RfcAttribute::class,
        'Nombre' => ReceptorAttributes\NombreAttribute::class,
        'DomicilioFiscalReceptor' => ReceptorAttributes\DomicilioFiscalReceptorAttribute::class,
        'ResidenciaFiscal' => ReceptorAttributes\ResidenciaFiscalAttribute::class,
        'NumRegIdTrib' => ReceptorAttributes\NumRegIdTribAttribute::class,
        'RegimenFiscalReceptor' => ReceptorAttributes\RegimenFiscalReceptorAttribute::class,
        'UsoCFDI' => ReceptorAttributes\UsoCFDIAttribute::class,
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
