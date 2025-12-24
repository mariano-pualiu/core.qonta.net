<?php

namespace App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto;

use Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Parte as ParteModels;
use App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos as ConceptosModels;
use App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte as ParteAttributes;
use App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\ParteElement;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Parte extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/4';
    const XML_ELEMENT_NAME = 'Parte';

    protected static string $elementData = ParteElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'parte';

    protected $collection = 'sat_cfdi_v40_parte';

    # Fillable

    protected $fillable = [
        'ClaveProdServ',
        'NoIdentificacion',
        'Cantidad',
        'Unidad',
        'Descripcion',
        'ValorUnitario',
        'Importe',
    ];

    # Casts

    protected $casts = [
        'ClaveProdServ' => ParteAttributes\ClaveProdServAttribute::class,
        'NoIdentificacion' => ParteAttributes\NoIdentificacionAttribute::class,
        'Cantidad' => ParteAttributes\CantidadAttribute::class,
        'Unidad' => ParteAttributes\UnidadAttribute::class,
        'Descripcion' => ParteAttributes\DescripcionAttribute::class,
        'ValorUnitario' => ParteAttributes\ValorUnitarioAttribute::class,
        'Importe' => ParteAttributes\ImporteAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/4}InformacionAduanera' => ParteModels\InformacionAduanera::class,
    ];

    # Relationships

    final public function informacionAduanera(ParteModels\InformacionAduanera $informacionAduanera = null): HasMany
    {
        return $this->hasMany(ParteModels\InformacionAduanera::class);
    }

    final public function concepto(ConceptosModels\Concepto $concepto = null): BelongsTo
    {
        return $this->belongsTo(ConceptosModels\Concepto::class);
    }

}
