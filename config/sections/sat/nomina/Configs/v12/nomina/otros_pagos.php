<?php

return [
    'model_name' => 'OtrosPagos',
    'collection_name' => 'OtrosPagos',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos' => 'OtrosPagosModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagosElement' => 'OtrosPagosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'OtroPago' => 'OtrosPagosModels\OtroPago::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_many' => [
                'otroPago' => [
                    'OtrosPagosModels\OtroPago::class',
                ],
            ],
            'belongs_to' => [
                'nomina' => [
                    'Nominav12Models\Nomina::class',
                ],
            ],
        ]
    ]
];
