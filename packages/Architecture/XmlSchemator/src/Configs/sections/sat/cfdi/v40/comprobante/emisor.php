<?php

return [
    'model_name' => 'Emisor',
    'collection_name' => 'Emisor',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Emisor' => 'EmisorAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\EmisorElement' => 'EmisorElement',
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
