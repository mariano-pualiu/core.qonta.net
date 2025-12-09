<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Concrete;

use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExportableContract;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\TraversableContract;
use Architecture\XmlSchemator\Parents\Values\Value;

/**
 * An ElementValue holds the attributes of an xml element node, it should be recursively exportable as an xml/json document or an array
 * If the type property is specified, it will also validate that
 * the passed value is consistent with it, from the "Type" definition's restritions
 *
 * A child class of this AttributeValue will be provided with some of these parameters:
 *     - Name (string, Required)
 *     - minOccurs (int, Optional)
 *     - maxOccurs (int|string, Optional)
 */

abstract class ElementValue extends Value implements Visitors\Contracts\ExportableContract, Visitors\Contracts\TraversableContract
{
    use Traits\Visitors\ExportingXmlElement, Traits\Visitors\TraversingXmlElement;

    public string $name;

    public int|null $minOccurs = null;

    public int|string|null $maxOccurs = null;
}
