<?php

return [
    'model_name' => 'CompensacionSaldosAFavor',
    'collection_name' => 'CompensacionSaldosAFavor',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos' => 'OtrosPagosModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavor' => 'CompensacionSaldosAFavorAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago\CompensacionSaldosAFavorElement' => 'CompensacionSaldosAFavorElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'otroPago' => [
                    'OtrosPagosModels\OtroPago::class',
                ],
            ],
        ]
    ]
];
