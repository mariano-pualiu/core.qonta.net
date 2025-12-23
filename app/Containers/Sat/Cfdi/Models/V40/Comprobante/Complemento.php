<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ComplementoElement;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\Common\Attributes\Nomina as NominaAttributes;
use App\Containers\Sat\Tfd\Models\V11 as TimbreFiscalDigitalV11Models;
use App\Containers\Sat\Tfd\Values\Common\Attributes\TimbreFiscalDigital as TimbreFiscalDigitalAttributes;
use App\Containers\Architecture\XmlSchemator\Exceptions\UnsupportedVersionException;
use App\Containers\Architecture\XmlSchemator\Models\Contracts\ComplementoInterface;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasOne;

class Complemento extends Model implements ComplementoInterface
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Complemento';

    protected static string $elementData = ComplementoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'complemento';

    protected $collection = 'sat_cfdi_v40_complemento';

    # Fillable

    protected $fillable = [
        'NominaVersion',
        'TimbreFiscalDigitalVersion',
    ];

    # Casts

    protected $casts = [
        'NominaVersion' => NominaAttributes\VersionAttribute::class,
        'TimbreFiscalDigitalVersion' => TimbreFiscalDigitalAttributes\VersionAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}Nomina' => NominaV12Models\Nomina::class,
        '{http://www.sat.gob.mx/TimbreFiscalDigital}TimbreFiscalDigital' => TimbreFiscalDigitalV11Models\TimbreFiscalDigital::class,
    ];

    # Relationships

    final public function comprobante(CfdiV40Models\Comprobante $comprobante = null): BelongsTo
    {
        return $this->belongsTo(CfdiV40Models\Comprobante::class);
    }

    final public function nomina(NominaV12Models\Nomina $nomina = null): HasOne
    {
        $versionNomina = $nomina?->Version ?? $this->NominaVersion;

        return match ($versionNomina?->value) {
            '1.2' => $this->hasOne(NominaV12Models\Nomina::class),
            default => throw new UnsupportedVersionException(__('unsupported_version_for_nomina_node', ['version' => $versionNomina?->value])),
        };
    }

    final public function timbreFiscalDigital(TimbreFiscalDigitalV11Models\TimbreFiscalDigital $timbreFiscalDigital = null): HasOne
    {
        $versionTimbreFiscalDigital = $timbreFiscalDigital?->Version ?? $this->TimbreFiscalDigitalVersion;

        return match ($versionTimbreFiscalDigital?->value) {
            '1.1' => $this->hasOne(TimbreFiscalDigitalV11Models\TimbreFiscalDigital::class),
            default => throw new UnsupportedVersionException(__('unsupported_version_for_timbre_fiscal_digital_node', ['version' => $versionTimbreFiscalDigital?->value])),
        };
    }

}
