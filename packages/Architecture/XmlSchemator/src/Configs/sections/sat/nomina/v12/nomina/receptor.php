<?php

return [
    'model_name' => 'Receptor',
    'collection_name' => 'Receptor',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Receptor' => 'ReceptorModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor' => 'ReceptorAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\ReceptorElement' => 'ReceptorElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'SubContratacion' => 'ReceptorModels\SubContratacion::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\HasMany' => [
                'subContratacion' => [
                    'ReceptorModels\SubContratacion::class',
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
