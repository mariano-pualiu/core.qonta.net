<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos\OtroPago;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos as OtrosPagosModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavor as CompensacionSaldosAFavorAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavorElement;
use MongoDB\Laravel\Relations\BelongsTo;

class CompensacionSaldosAFavor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'CompensacionSaldosAFavor';

    protected static string $elementData = CompensacionSaldosAFavorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'compensacion_saldos_a_favor';

    protected $collection = 'sat_nomina_v12_compensacion_saldos_a_favor';

    # Fillable

    protected $fillable = [
        'SaldoAFavor',
        'Año',
        'RemanenteSalFav',
    ];

    # Casts

    protected $casts = [
        'SaldoAFavor' => CompensacionSaldosAFavorAttributes\SaldoAFavorAttribute::class,
        'Año' => CompensacionSaldosAFavorAttributes\AñoAttribute::class,
        'RemanenteSalFav' => CompensacionSaldosAFavorAttributes\RemanenteSalFavAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function otroPago(OtrosPagosModels\OtroPago $otroPago = null): BelongsTo
    {
        return $this->belongsTo(OtrosPagosModels\OtroPago::class);
    }

}
