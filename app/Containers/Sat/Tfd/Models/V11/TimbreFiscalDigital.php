<?php

namespace App\Containers\Sat\Tfd\Models\V11;

use Architecture\XmlSchemator\Parents\Models\Model;
use Architecture\XmlSchemator\Analyzer\Common\Casts\Attributes\NamespacesCast;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Models\V33 as CfdiV33Models;
use App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital as TimbreFiscalDigitalAttributes;
use App\Containers\Sat\Tfd\Values\V11\Elements\TimbreFiscalDigitalElement;
use Architecture\XmlSchemator\Common\Exceptions\UnsupportedVersionException;
use App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante as ComprobanteAttributes;
use Architecture\XmlSchemator\Contexts\Models\Contracts\TimbreFiscalDigitalInterface;
use MongoDB\Laravel\Relations\BelongsTo;

class TimbreFiscalDigital extends Model implements TimbreFiscalDigitalInterface
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/TimbreFiscalDigital';
    const XML_ELEMENT_NAME = 'TimbreFiscalDigital';

    protected static string $elementData = TimbreFiscalDigitalElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'timbre_fiscal_digital';

    protected $collection = 'sat_tfd_v11_timbre_fiscal_digital';

    # Fillable

    protected $fillable = [
        'ComprobanteVersion',
        'Version',
        'UUID',
        'FechaTimbrado',
        'RfcProvCertif',
        'Leyenda',
        'SelloCFD',
        'NoCertificadoSAT',
        'SelloSAT',
    ];

    # Casts

    protected $casts = [
        'Namespaces' => NamespacesCast::class,
        'Version' => TimbreFiscalDigitalAttributes\VersionAttribute::class,
        'UUID' => TimbreFiscalDigitalAttributes\UUIDAttribute::class,
        'FechaTimbrado' => TimbreFiscalDigitalAttributes\FechaTimbradoAttribute::class,
        'RfcProvCertif' => TimbreFiscalDigitalAttributes\RfcProvCertifAttribute::class,
        'Leyenda' => TimbreFiscalDigitalAttributes\LeyendaAttribute::class,
        'SelloCFD' => TimbreFiscalDigitalAttributes\SelloCFDAttribute::class,
        'NoCertificadoSAT' => TimbreFiscalDigitalAttributes\NoCertificadoSATAttribute::class,
        'SelloSAT' => TimbreFiscalDigitalAttributes\SelloSATAttribute::class,
        'ComprobanteVersion' => ComprobanteAttributes\VersionAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function complemento(CfdiV40Models\Comprobante\Complemento|CfdiV33Models\Comprobante\Complemento $complemento = null): BelongsTo
    {
        $versionComplemento = match (get_class($complemento)::XML_NAMESPACE) {
            'http://www.sat.gob.mx/cfd/4'  => '4.0',
            'http://www.sat.gob.mx/cfd/33' => '3.3',
            default                        => $this->ComprobanteVersion?->value,
        };

        return match ($versionComplemento) {
            '3.3'   => $this->belongsTo(CfdiV40Models\Comprobante\Complemento::class),
            '4.0'   => $this->belongsTo(CfdiV33Models\Comprobante\Complemento::class),
            default => throw new UnsupportedVersionException(__('unsupported_version_for_complemento_node', ['version' => $versionComplemento])),
        };
    }

}
