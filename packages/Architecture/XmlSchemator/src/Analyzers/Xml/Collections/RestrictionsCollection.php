<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Collections;

use Architecture\XmlSchemator\Analyzers\Xml\Values\Schema\ComplexType\Attribute\SimpleType\Restriction\EnumerationNodeValue;
use Illuminate\Database\Eloquent\Collection;

class RestrictionsCollection extends Collection
{
    public function formatEnumerationOptionsAsEnumerationNodeAttributes()
    {
        return $this->pipe(function ($restrictionNodes) {
                [$enumerationNodes, $notEnumerationNodes] = $restrictionNodes
                    ->partition(function ($restrictionNode) {
                        return $restrictionNode instanceof EnumerationNodeValue;
                    });

                if ($enumerationNodes->isNotEmpty()) {
                    $enumerationNodes = [new EnumerationNodeValue([
                        'name' => '{http://www.w3.org/2001/XMLSchema}enumeration',
                        'value' => null,
                        'attributes' => $enumerationNodes
                            ->pluck('attributes.*.value')
                            ->flatten()
                    ])];
                }

                return $notEnumerationNodes->concat($enumerationNodes);
            });
    }
}
