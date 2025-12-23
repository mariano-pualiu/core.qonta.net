<?php

return [
    'model_name' => 'SubContratacion',
    'collection_name' => 'SubContratacion',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Receptor\SubContratacion' => 'SubContratacionAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Receptor\SubContratacionElement' => 'SubContratacionElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'receptor' => [
                    'NominaModels\Receptor::class',
                ],
            ],
        ]
    ]
];
