<?php

return [
    'model_name'      => 'Nomina',
    'collection_name' => 'Nomina',
    'namespaces' => [
        // 'App\Containers\Architecture\XmlSchemator\Analyzers\Xml\Casts\Attributes\NamespacesCast' => 'NamespacesCast',
        'App\Containers\Sat\Nomina\Models\V12\Nomina'                                            => 'NominaModels',
        // 'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina'                                 => 'NominaAttributes',
        // 'App\Containers\Sat\Nomina\Values\V12\Elements\NominaElement'                            => 'NominaElement',
    ],
    'implements' => [
    ],
    'traits' => [
    ],
    'properties' => [
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'complemento' => [
                    'ComprobanteInterface::class',
                ],
            ],
        ]
    ]
];
