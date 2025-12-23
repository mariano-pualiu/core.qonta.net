<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos as OtrosPagosModels;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagosElement;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;

class OtrosPagos extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'OtrosPagos';

    protected static string $elementData = OtrosPagosElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'otros_pagos';

    protected $collection = 'sat_nomina_v12_otros_pagos';

    # Fillable

    protected $fillable = [
    ];

    # Casts

    protected $casts = [
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}OtroPago' => OtrosPagosModels\OtroPago::class,
    ];

    # Relationships

    final public function otroPago(OtrosPagosModels\OtroPago $otroPago = null): HasMany
    {
        return $this->hasMany(OtrosPagosModels\OtroPago::class);
    }

    final public function nomina(Nominav12Models\Nomina $nomina = null): BelongsTo
    {
        return $this->belongsTo(Nominav12Models\Nomina::class);
    }

}
