<?php

return [
    'model_name' => 'EntidadSNCF',
    'collection_name' => 'EntidadSNCF',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Emisor\EntidadSNCF' => 'EntidadSNCFAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Emisor\EntidadSNCFElement' => 'EntidadSNCFElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'emisor' => [
                    'NominaModels\Emisor::class',
                ],
            ],
        ]
    ]
];
