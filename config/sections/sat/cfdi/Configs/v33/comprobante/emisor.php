<?php

return [
    'model_name' => 'Emisor',
    'collection_name' => 'Emisor',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Emisor' => 'EmisorAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\EmisorElement' => 'EmisorElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'comprobante' => [
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
