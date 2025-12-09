<?php

return [
    'model_name' => 'EntidadSNCF',
    'collection_name' => 'EntidadSNCF',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor\EntidadSNCF' => 'EntidadSNCFAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Emisor\EntidadSNCFElement' => 'EntidadSNCFElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'emisor' => [
                    'NominaModels\Emisor::class',
                ],
            ],
        ]
    ]
];
