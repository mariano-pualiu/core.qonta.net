<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Parsers;

use Architecture\XmlSchemator\Analyzers\Xml\Parsers\Reader;
use Sabre\Xml\Service as SabreService;

class Service extends SabreService
{
    /**
     * Returns a fresh XML Reader.
     */
    public function getReader(): Reader
    {
        $r = new Reader();
        $r->elementMap = $this->elementMap;

        return $r;
    }
}
