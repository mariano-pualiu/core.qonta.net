<?php

return [
    'model_name' => 'Incapacidades',
    'collection_name' => 'Incapacidades',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Incapacidades' => 'IncapacidadesModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\IncapacidadesElement' => 'IncapacidadesElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'Incapacidad' => 'IncapacidadesModels\Incapacidad::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'incapacidad' => [
                    'IncapacidadesModels\Incapacidad::class',
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
