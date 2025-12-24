<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Receptor as ReceptorModels;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor as ReceptorAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\ReceptorElement;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Receptor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Receptor';

    protected static string $elementData = ReceptorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'receptor';

    protected $collection = 'sat_nomina_v12_receptor';

    # Fillable

    protected $fillable = [
        'Curp',
        'NumSeguridadSocial',
        'FechaInicioRelLaboral',
        'Antigüedad',
        'TipoContrato',
        'Sindicalizado',
        'TipoJornada',
        'TipoRegimen',
        'NumEmpleado',
        'Departamento',
        'Puesto',
        'RiesgoPuesto',
        'PeriodicidadPago',
        'Banco',
        'CuentaBancaria',
        'SalarioBaseCotApor',
        'SalarioDiarioIntegrado',
        'ClaveEntFed',
    ];

    # Casts

    protected $casts = [
        'Curp' => ReceptorAttributes\CurpAttribute::class,
        'NumSeguridadSocial' => ReceptorAttributes\NumSeguridadSocialAttribute::class,
        'FechaInicioRelLaboral' => ReceptorAttributes\FechaInicioRelLaboralAttribute::class,
        'Antigüedad' => ReceptorAttributes\AntigüedadAttribute::class,
        'TipoContrato' => ReceptorAttributes\TipoContratoAttribute::class,
        'Sindicalizado' => ReceptorAttributes\SindicalizadoAttribute::class,
        'TipoJornada' => ReceptorAttributes\TipoJornadaAttribute::class,
        'TipoRegimen' => ReceptorAttributes\TipoRegimenAttribute::class,
        'NumEmpleado' => ReceptorAttributes\NumEmpleadoAttribute::class,
        'Departamento' => ReceptorAttributes\DepartamentoAttribute::class,
        'Puesto' => ReceptorAttributes\PuestoAttribute::class,
        'RiesgoPuesto' => ReceptorAttributes\RiesgoPuestoAttribute::class,
        'PeriodicidadPago' => ReceptorAttributes\PeriodicidadPagoAttribute::class,
        'Banco' => ReceptorAttributes\BancoAttribute::class,
        'CuentaBancaria' => ReceptorAttributes\CuentaBancariaAttribute::class,
        'SalarioBaseCotApor' => ReceptorAttributes\SalarioBaseCotAporAttribute::class,
        'SalarioDiarioIntegrado' => ReceptorAttributes\SalarioDiarioIntegradoAttribute::class,
        'ClaveEntFed' => ReceptorAttributes\ClaveEntFedAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}SubContratacion' => ReceptorModels\SubContratacion::class,
    ];

    # Relationships

    final public function subContratacion(ReceptorModels\SubContratacion $subContratacion = null): HasMany
    {
        return $this->hasMany(ReceptorModels\SubContratacion::class);
    }

    final public function nomina(Nominav12Models\Nomina $nomina = null): BelongsTo
    {
        return $this->belongsTo(Nominav12Models\Nomina::class);
    }

}
