<?php

namespace App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Emisor;

use App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor\EntidadSNCF as EntidadSNCFAttributes;
use Architecture\XmlSchemator\Analyzer\Elements\ElementData;

/**
 * "Nodo condicional para que las entidades adheridas al Sistema Nacional de Coordinación Fiscal realicen la identificación del origen de los recursos utilizados en el pago de nómina del personal que presta o desempeña un servicio personal subordinado en las dependencias de la entidad federativa, del municipio o demarcación territorial de la Ciudad de México, así como en sus respectivos organismos autónomos y entidades paraestatales y paramunicipales"
 */
class EntidadSNCFElement extends ElementData
{
    # Elements;

    public function __construct(
        # Properties{{class:properties}}
        # Attributes
        #[WithCastable(EntidadSNCFAttributes\OrigenRecursoAttribute::class)]
        public EntidadSNCFAttributes\OrigenRecursoAttribute $OrigenRecurso,

        #[WithCastable(EntidadSNCFAttributes\MontoRecursoPropioAttribute::class)]
        public ?EntidadSNCFAttributes\MontoRecursoPropioAttribute $MontoRecursoPropio = null
    )
    {}
}
