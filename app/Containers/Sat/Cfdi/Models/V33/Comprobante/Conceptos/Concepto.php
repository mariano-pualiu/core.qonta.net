<?php

namespace App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto as ConceptoModels;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante as ComprobanteModels;
use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto as ConceptoAttributes;
use App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\ConceptoElement;
use MongoDB\Laravel\Relations\HasOne;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\BelongsTo;

class Concepto extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Concepto';

    protected static string $elementData = ConceptoElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'concepto';

    protected $collection = 'sat_cfdi_v33_concepto';

    # Fillable

    protected $fillable = [
        'ClaveProdServ',
        'NoIdentificacion',
        'Cantidad',
        'ClaveUnidad',
        'Unidad',
        'Descripcion',
        'ValorUnitario',
        'Importe',
        'Descuento',
    ];

    # Casts

    protected $casts = [
        'ClaveProdServ' => ConceptoAttributes\ClaveProdServAttribute::class,
        'NoIdentificacion' => ConceptoAttributes\NoIdentificacionAttribute::class,
        'Cantidad' => ConceptoAttributes\CantidadAttribute::class,
        'ClaveUnidad' => ConceptoAttributes\ClaveUnidadAttribute::class,
        'Unidad' => ConceptoAttributes\UnidadAttribute::class,
        'Descripcion' => ConceptoAttributes\DescripcionAttribute::class,
        'ValorUnitario' => ConceptoAttributes\ValorUnitarioAttribute::class,
        'Importe' => ConceptoAttributes\ImporteAttribute::class,
        'Descuento' => ConceptoAttributes\DescuentoAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/3}Impuestos' => ConceptoModels\Impuestos::class,
        '{http://www.sat.gob.mx/cfd/3}InformacionAduanera' => ConceptoModels\InformacionAduanera::class,
        '{http://www.sat.gob.mx/cfd/3}CuentaPredial' => ConceptoModels\CuentaPredial::class,
        '{http://www.sat.gob.mx/cfd/3}ComplementoConcepto' => ConceptoModels\ComplementoConcepto::class,
        '{http://www.sat.gob.mx/cfd/3}Parte' => ConceptoModels\Parte::class,
    ];

    # Relationships

    final public function impuestos(ConceptoModels\Impuestos $impuestos = null): HasOne
    {
        return $this->hasOne(ConceptoModels\Impuestos::class);
    }

    final public function informacionAduanera(ConceptoModels\InformacionAduanera $informacionAduanera = null): HasMany
    {
        return $this->hasMany(ConceptoModels\InformacionAduanera::class);
    }

    final public function parte(ConceptoModels\Parte $parte = null): HasMany
    {
        return $this->hasMany(ConceptoModels\Parte::class);
    }

    final public function cuentaPredial(ConceptoModels\CuentaPredial $cuentaPredial = null): EmbedsOne
    {
        return $this->embedsOne(ConceptoModels\CuentaPredial::class);
    }

    final public function complementoConcepto(ConceptoModels\ComplementoConcepto $complementoConcepto = null): EmbedsOne
    {
        return $this->embedsOne(ConceptoModels\ComplementoConcepto::class);
    }

    final public function conceptos(ComprobanteModels\Conceptos $conceptos = null): BelongsTo
    {
        return $this->belongsTo(ComprobanteModels\Conceptos::class);
    }

}
