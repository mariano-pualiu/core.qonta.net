<?php

return [
    'model_name' => 'Addenda',
    'collection_name' => 'Addenda',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\AddendaElement' => 'AddendaElement',
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
                'comprobante' => [
                    'Cfdiv40Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
