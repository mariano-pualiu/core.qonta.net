<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina\Emisor as EmisorModels;
use App\Containers\Sat\Nomina\Models\V12 as NominaV12Models;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor as EmisorAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\EmisorElement;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\BelongsTo;

class Emisor extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Emisor';

    protected static string $elementData = EmisorElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'emisor';

    protected $collection = 'sat_nomina_v12_emisor';

    # Fillable

    protected $fillable = [
        'Curp',
        'RegistroPatronal',
        'RfcPatronOrigen',
    ];

    # Casts

    protected $casts = [
        'Curp' => EmisorAttributes\CurpAttribute::class,
        'RegistroPatronal' => EmisorAttributes\RegistroPatronalAttribute::class,
        'RfcPatronOrigen' => EmisorAttributes\RfcPatronOrigenAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/nomina12}EntidadSNCF' => EmisorModels\EntidadSNCF::class,
    ];

    # Relationships

    final public function entidadSNCF(EmisorModels\EntidadSNCF $entidadSNCF = null): EmbedsOne
    {
        return $this->embedsOne(EmisorModels\EntidadSNCF::class);
    }

    final public function nomina(Nominav12Models\Nomina $nomina = null): BelongsTo
    {
        return $this->belongsTo(Nominav12Models\Nomina::class);
    }

}
