<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums;

use ArchTech\Enums\Options;
use Illuminate\Support\Str;

enum NodesEnum: string
{
    use Options;

    case XS_SCHEMA        = 'xs:schema';
    case XS_ANNOTATION    = 'xs:annotation';
    case XS_DOCUMENTATION = 'xs:documentation';
    case XS_ELEMENT       = 'xs:element';
    case XS_IMPORT        = 'xs:import';
    case XS_COMPLEX_TYPE  = 'xs:complexType';
    case XS_ATTRIBUTE     = 'xs:attribute';
    case XS_SEQUENCE      = 'xs:sequence';
    case XS_ANY           = 'xs:any';
    case XS_SIMPLE_TYPE   = 'xs:simpleType';
    case XS_RESTRICTION   = 'xs:restriction';

    public function nodeName()
    {
        return Str::after($this->value, ':');
    }
}
