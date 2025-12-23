<?php

namespace App\Containers\Sat\Cfdi\Models\V33;

use App\Containers\Architecture\XmlSchemator\Parents\Models\Model;
use Architecture\XmlSchemator\Analyzer\Common\Casts\Attributes\NamespacesCast;
use App\Containers\Sat\Cfdi\Models\V33\Comprobante as ComprobanteModels;
use App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante as ComprobanteAttributes;
use App\Containers\Sat\Cfdi\Values\V33\Elements\ComprobanteElement;
use MongoDB\Laravel\Relations\HasOne;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\HasMany;

class Comprobante extends Model
{
    const XML_NAMESPACE = 'http://www.sat.gob.mx/cfd/3';
    const XML_ELEMENT_NAME = 'Comprobante';

    protected static string $elementData = ComprobanteElement::class;
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'comprobante';

    protected $collection = 'sat_cfdi_v33_comprobante';

    # Fillable

    protected $fillable = [
        'Version',
        'Serie',
        'Folio',
        'Fecha',
        'Sello',
        'FormaPago',
        'NoCertificado',
        'Certificado',
        'CondicionesDePago',
        'SubTotal',
        'Descuento',
        'Moneda',
        'TipoCambio',
        'Total',
        'TipoDeComprobante',
        'MetodoPago',
        'LugarExpedicion',
        'Confirmacion',
    ];

    # Casts

    protected $casts = [
        'Namespaces' => NamespacesCast::class,
        'Version' => ComprobanteAttributes\VersionAttribute::class,
        'Serie' => ComprobanteAttributes\SerieAttribute::class,
        'Folio' => ComprobanteAttributes\FolioAttribute::class,
        'Fecha' => ComprobanteAttributes\FechaAttribute::class,
        'Sello' => ComprobanteAttributes\SelloAttribute::class,
        'FormaPago' => ComprobanteAttributes\FormaPagoAttribute::class,
        'NoCertificado' => ComprobanteAttributes\NoCertificadoAttribute::class,
        'Certificado' => ComprobanteAttributes\CertificadoAttribute::class,
        'CondicionesDePago' => ComprobanteAttributes\CondicionesDePagoAttribute::class,
        'SubTotal' => ComprobanteAttributes\SubTotalAttribute::class,
        'Descuento' => ComprobanteAttributes\DescuentoAttribute::class,
        'Moneda' => ComprobanteAttributes\MonedaAttribute::class,
        'TipoCambio' => ComprobanteAttributes\TipoCambioAttribute::class,
        'Total' => ComprobanteAttributes\TotalAttribute::class,
        'TipoDeComprobante' => ComprobanteAttributes\TipoDeComprobanteAttribute::class,
        'MetodoPago' => ComprobanteAttributes\MetodoPagoAttribute::class,
        'LugarExpedicion' => ComprobanteAttributes\LugarExpedicionAttribute::class,
        'Confirmacion' => ComprobanteAttributes\ConfirmacionAttribute::class,
    ];

    # Deserializers

    public static $xmlDeserializers = [
        '{http://www.sat.gob.mx/cfd/3}CfdiRelacionados' => ComprobanteModels\CfdiRelacionados::class,
        '{http://www.sat.gob.mx/cfd/3}Emisor' => ComprobanteModels\Emisor::class,
        '{http://www.sat.gob.mx/cfd/3}Receptor' => ComprobanteModels\Receptor::class,
        '{http://www.sat.gob.mx/cfd/3}Conceptos' => ComprobanteModels\Conceptos::class,
        '{http://www.sat.gob.mx/cfd/3}Impuestos' => ComprobanteModels\Impuestos::class,
        '{http://www.sat.gob.mx/cfd/3}Complemento' => ComprobanteModels\Complemento::class,
        '{http://www.sat.gob.mx/cfd/3}Addenda' => ComprobanteModels\Addenda::class,
    ];

    # Relationships

    final public function cfdiRelacionados(ComprobanteModels\CfdiRelacionados $cfdiRelacionados = null): HasOne
    {
        return $this->hasOne(ComprobanteModels\CfdiRelacionados::class);
    }

    final public function conceptos(ComprobanteModels\Conceptos $conceptos = null): HasOne
    {
        return $this->hasOne(ComprobanteModels\Conceptos::class);
    }

    final public function impuestos(ComprobanteModels\Impuestos $impuestos = null): HasOne
    {
        return $this->hasOne(ComprobanteModels\Impuestos::class);
    }

    final public function emisor(ComprobanteModels\Emisor $emisor = null): EmbedsOne
    {
        return $this->embedsOne(ComprobanteModels\Emisor::class);
    }

    final public function receptor(ComprobanteModels\Receptor $receptor = null): EmbedsOne
    {
        return $this->embedsOne(ComprobanteModels\Receptor::class);
    }

    final public function addenda(ComprobanteModels\Addenda $addenda = null): EmbedsOne
    {
        return $this->embedsOne(ComprobanteModels\Addenda::class);
    }

    final public function complemento(ComprobanteModels\Complemento $complemento = null): HasMany
    {
        return $this->hasMany(ComprobanteModels\Complemento::class);
    }

}
