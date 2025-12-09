<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values;

use App\Ship\Parents\Values\Value;

class XmlAttributeValue extends Value
{
    public $name;

    public $value;

    public function __construct($value, $name)
    {
        $this->value = $value;

        $this->name = $name;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function toArray()
    {
        return [$this->name => $this->value];
    }
}
