<?php

return [
    'model_name' => 'Incapacidades',
    'collection_name' => 'Incapacidades',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Incapacidades' => 'IncapacidadesModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\IncapacidadesElement' => 'IncapacidadesElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'Incapacidad' => 'IncapacidadesModels\Incapacidad::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsMany' => [
                'incapacidad' => [
                    'IncapacidadesModels\Incapacidad::class',
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
