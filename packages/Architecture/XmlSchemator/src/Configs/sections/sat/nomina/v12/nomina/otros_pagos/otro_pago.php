<?php

return [
    'model_name' => 'OtroPago',
    'collection_name' => 'OtroPago',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\OtrosPagos\OtroPago' => 'OtroPagoModels',
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\OtrosPagos\OtroPago' => 'OtroPagoAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\OtrosPagos\OtroPagoElement' => 'OtroPagoElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'SubsidioAlEmpleo' => 'OtroPagoModels\SubsidioAlEmpleo::class',
                'CompensacionSaldosAFavor' => 'OtroPagoModels\CompensacionSaldosAFavor::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'subsidioAlEmpleo' => [
                    'OtroPagoModels\SubsidioAlEmpleo::class',
                ],
                'compensacionSaldosAFavor' => [
                    'OtroPagoModels\CompensacionSaldosAFavor::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'otrosPagos' => [
                    'NominaModels\OtrosPagos::class',
                ],
            ],
        ]
    ]
];
