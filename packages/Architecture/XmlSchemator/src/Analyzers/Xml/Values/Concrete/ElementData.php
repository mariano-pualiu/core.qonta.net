<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Concrete;

use Architecture\XmlSchemator\Parents\Values\Data;
use Illuminate\Support\Collection;
/**
 * An ElementData holds the attributes of an xml element node, it should be recursively exportable as an xml/json document or an array
 * If the type property is specified, it will also validate that
 * the passed value is consistent with it, from the "Type" definition's restritions
 *
 * A child class of this AttributeValue will be provided with some of these parameters:
 *     - Name (string, Required)
 *     - minOccurs (int, Optional)
 *     - maxOccurs (int|string, Optional)
 */

abstract class ElementData extends Data
{
}
