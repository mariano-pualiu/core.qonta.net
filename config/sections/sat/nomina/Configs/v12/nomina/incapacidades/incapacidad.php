<?php

return [
    'model_name' => 'Incapacidad',
    'collection_name' => 'Incapacidad',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Incapacidades\Incapacidad' => 'IncapacidadAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Incapacidades\IncapacidadElement' => 'IncapacidadElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'incapacidades' => [
                    'NominaModels\Incapacidades::class',
                ],
            ],
        ]
    ]
];
