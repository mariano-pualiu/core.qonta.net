<?php

return [
    'model_name'      => 'TimbreFiscalDigital',
    'collection_name' => 'TimbreFiscalDigital',
    'namespaces' => [
        'App\Containers\Architecture\XmlSchemator\Analyzers\Xml\Casts\Attributes\NamespacesCast' => 'NamespacesCast',
        'App\Containers\Sat\Tfd\Values\V11\Attributes\TimbreFiscalDigital'                       => 'TimbreFiscalDigitalAttributes',
        'App\Containers\Sat\Tfd\Values\V11\Elements\TimbreFiscalDigitalElement'                  => 'TimbreFiscalDigitalElement',
    ],
    'implements' => [
        'Sabre\Xml\XmlDeserializable' => 'XmlDeserializable',
        'Sabre\Xml\XmlSerializable'   => 'XmlSerializable',
        'App\Containers\Sat\Tfd\Models\Contracts\TimbreFiscalDigitalInterface'   => 'TimbreFiscalDigitalInterface',
    ],
    'traits' => [
        'App\Containers\Sat\Tfd\Models\Traits\BelongsToVersionedRelationshipTrait' => 'BelongsToVersionedRelationshipTrait'
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
        ]
    ]
];
