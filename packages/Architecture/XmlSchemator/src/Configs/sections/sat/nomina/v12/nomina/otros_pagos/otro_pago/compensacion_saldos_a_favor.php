<?php

return [
    'model_name' => 'CompensacionSaldosAFavor',
    'collection_name' => 'CompensacionSaldosAFavor',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos' => 'OtrosPagosModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavor' => 'CompensacionSaldosAFavorAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavorElement' => 'CompensacionSaldosAFavorElement',
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
                'otroPago' => [
                    'OtrosPagosModels\OtroPago::class',
                ],
            ],
        ]
    ]
];
