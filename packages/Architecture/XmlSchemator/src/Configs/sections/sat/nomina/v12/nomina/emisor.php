<?php

return [
    'model_name' => 'Emisor',
    'collection_name' => 'Emisor',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Emisor' => 'EmisorModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor' => 'EmisorAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\EmisorElement' => 'EmisorElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'EntidadSNCF' => 'EmisorModels\EntidadSNCF::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'entidadSNCF' => [
                    'EmisorModels\EntidadSNCF::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'nomina' => [
                    'Nominav12Models\Nomina::class',
                ],
            ],
        ]
    ]
];
