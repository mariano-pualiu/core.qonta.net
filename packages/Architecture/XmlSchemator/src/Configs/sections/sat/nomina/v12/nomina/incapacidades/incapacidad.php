<?php

return [
    'model_name' => 'Incapacidad',
    'collection_name' => 'Incapacidad',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad' => 'IncapacidadAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Incapacidades\IncapacidadElement' => 'IncapacidadElement',
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
                'incapacidades' => [
                    'NominaModels\Incapacidades::class',
                ],
            ],
        ]
    ]
];
