<?php

return [
    'model_name' => 'OtrosPagos',
    'collection_name' => 'OtrosPagos',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos' => 'OtrosPagosModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagosElement' => 'OtrosPagosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'OtroPago' => 'OtrosPagosModels\OtroPago::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\HasMany' => [
                'otroPago' => [
                    'OtrosPagosModels\OtroPago::class',
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
