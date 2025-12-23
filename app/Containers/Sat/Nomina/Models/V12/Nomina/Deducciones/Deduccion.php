<?php

namespace App\Containers\Sat\Nomina\Models\V12\Nomina\Deducciones;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Nomina\Models\V12\Nomina as NominaModels;
use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Deducciones\Deduccion as DeduccionAttributes;
use App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Deducciones\DeduccionElement;
use MongoDB\Laravel\Relations\BelongsTo;

class Deduccion extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/nomina12';
    const XML_ELEMENT_NAME = 'Deduccion';

    protected static string $elementData = DeduccionElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'deduccion';

    protected $collection = 'sat_nomina_v12_deduccion';

    # Fillable

    protected $fillable = [
        'TipoDeduccion',
        'Clave',
        'Concepto',
        'Importe',
    ];

    # Casts

    protected $casts = [
        'TipoDeduccion' => DeduccionAttributes\TipoDeduccionAttribute::class,
        'Clave' => DeduccionAttributes\ClaveAttribute::class,
        'Concepto' => DeduccionAttributes\ConceptoAttribute::class,
        'Importe' => DeduccionAttributes\ImporteAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
    ];

    # Relationships

    final public function deducciones(NominaModels\Deducciones $deducciones = null): BelongsTo
    {
        return $this->belongsTo(NominaModels\Deducciones::class);
    }

}
