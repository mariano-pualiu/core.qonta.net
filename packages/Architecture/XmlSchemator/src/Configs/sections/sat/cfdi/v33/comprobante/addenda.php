<?php

return [
    'model_name' => 'Addenda',
    'collection_name' => 'Addenda',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\AddendaElement' => 'AddendaElement',
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
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
