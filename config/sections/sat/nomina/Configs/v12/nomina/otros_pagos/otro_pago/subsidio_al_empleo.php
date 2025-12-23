<?php

return [
    'model_name' => 'SubsidioAlEmpleo',
    'collection_name' => 'SubsidioAlEmpleo',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos' => 'OtrosPagosModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleo' => 'SubsidioAlEmpleoAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPago\SubsidioAlEmpleoElement' => 'SubsidioAlEmpleoElement',
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
