<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Attributes;

use Architecture\XmlSchemator\Parents\Values\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

/**
 * "Atributo requerido con valor prefijado a 4.0 que indica la versión del estándar bajo el que se encuentra expresado el comprobante."
 */
class NamespacesAttribute extends Data
{
    public function __construct(
        #[DataCollectionOf(NamespaceAttribute::class)]
        public DataCollection $value
    )
    {}
}
