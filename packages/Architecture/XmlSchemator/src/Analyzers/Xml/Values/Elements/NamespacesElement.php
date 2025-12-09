<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Elements;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Attributes\NamespacesAttribute;
use Architecture\XmlSchemator\Analyzers\Xml\Values\Concrete\ElementData;

/**
 * "Estándar de Comprobante Fiscal Digital por Internet."
 */
class NamespacesElement extends ElementData
{
    public function __construct(
        # Properties{{class:properties}}
        # Elements{{class:elements}}
        # Attributes

        #[WithCastable(NamespacesAttribute::class)]
        public NamespacesAttribute $Namespaces,
    )
    {}
}
