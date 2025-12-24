<?php

namespace App\Containers\Sat\Nomina\Models\V12;

use Architecture\XmlSchemator\Parents\Models\Model;
use AArchitecture\XmlSchemator\Analyzer\Common\Casts\Attributes\NamespacesCast;
use App\Containers\Sat\Cfdi\Models\V40 as CfdiV40Models;
use App\Containers\Sat\Cfdi\Models\V33 as CfdiV33Models;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina as NominaAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\NominaElement;
use App\Containers\Sat\Cfdi\Values\Common\Attributes\Comprobante as ComprobanteAttributes;
use Architecture\XmlSchemator\Common\Exceptions\UnsupportedVersionException;
use Architecture\XmlSchemator\Contexts\Models\Contracts\NominaInterface;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasOne;

class Nomina extends Model implements NominaInterface
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Nomina';

    protected static string $elementData = NominaElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'nomina';

    protected $collection = 'sat_nomina_v12_nomina';

    # Fillable

    protected $fillable = [
        'ComprobanteVersion',
        'Version',
        'TipoNomina',
        'FechaPago',
        'FechaInicialPago',
        'FechaFinalPago',
        'NumDiasPagados',
        'TotalPercepciones',
        'TotalDeducciones',
        'TotalOtrosPagos',
    ];

    # Casts

    protected $casts = [
        'Namespaces' => NamespacesCast::class,
        'Version' => NominaAttributes\VersionAttribute::class,
        'TipoNomina' => NominaAttributes\TipoNominaAttribute::class,
        'FechaPago' => NominaAttributes\FechaPagoAttribute::class,
        'FechaInicialPago' => NominaAttributes\FechaInicialPagoAttribute::class,
        'FechaFinalPago' => NominaAttributes\FechaFinalPagoAttribute::class,
        'NumDiasPagados' => NominaAttributes\NumDiasPagadosAttribute::class,
        'TotalPercepciones' => NominaAttributes\TotalPercepcionesAttribute::class,
        'TotalDeducciones' => NominaAttributes\TotalDeduccionesAttribute::class,
        'TotalOtrosPagos' => NominaAttributes\TotalOtrosPagosAttribute::class,
        'ComprobanteVersion' => ComprobanteAttributes\VersionAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}Emisor' => NominaModels\Emisor::class,
        '{http://www.sat.gob.mx/nomina12}Receptor' => NominaModels\Receptor::class,
        '{http://www.sat.gob.mx/nomina12}Percepciones' => NominaModels\Percepciones::class,
        '{http://www.sat.gob.mx/nomina12}Deducciones' => NominaModels\Deducciones::class,
        '{http://www.sat.gob.mx/nomina12}OtrosPagos' => NominaModels\OtrosPagos::class,
        '{http://www.sat.gob.mx/nomina12}Incapacidades' => NominaModels\Incapacidades::class,
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

    final public function emisor(NominaModels\Emisor $emisor = null): HasOne
    {
        return $this->hasOne(NominaModels\Emisor::class);
    }

    final public function receptor(NominaModels\Receptor $receptor = null): HasOne
    {
        return $this->hasOne(NominaModels\Receptor::class);
    }

    final public function percepciones(NominaModels\Percepciones $percepciones = null): HasOne
    {
        return $this->hasOne(NominaModels\Percepciones::class);
    }

    final public function deducciones(NominaModels\Deducciones $deducciones = null): HasOne
    {
        return $this->hasOne(NominaModels\Deducciones::class);
    }

    final public function otrosPagos(NominaModels\OtrosPagos $otrosPagos = null): HasOne
    {
        return $this->hasOne(NominaModels\OtrosPagos::class);
    }

    final public function incapacidades(NominaModels\Incapacidades $incapacidades = null): HasOne
    {
        return $this->hasOne(NominaModels\Incapacidades::class);
    }

}
