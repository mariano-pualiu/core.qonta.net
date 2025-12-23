<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33 as CfdiV33Models;
use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Receptor as ReceptorAttributes;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\ReceptorElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Receptor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Receptor';

    protected static string $elementData = ReceptorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'receptor';

    protected $collection = 'sat_cfdi_v33_receptor';

    # Fillable

    protected $fillable = [
        'Rfc',
        'Nombre',
        'ResidenciaFiscal',
        'NumRegIdTrib',
        'UsoCFDI',
    ];

    # Casts

    protected $casts = [
        'Rfc' => ReceptorAttributes\RfcAttribute::class,
        'Nombre' => ReceptorAttributes\NombreAttribute::class,
        'ResidenciaFiscal' => ReceptorAttributes\ResidenciaFiscalAttribute::class,
        'NumRegIdTrib' => ReceptorAttributes\NumRegIdTribAttribute::class,
        'UsoCFDI' => ReceptorAttributes\UsoCFDIAttribute::class,
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
