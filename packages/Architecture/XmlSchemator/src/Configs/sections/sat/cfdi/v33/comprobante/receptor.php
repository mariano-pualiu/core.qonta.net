<?php

return [
    'model_name' => 'Receptor',
    'collection_name' => 'Receptor',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Receptor' => 'ReceptorAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\ReceptorElement' => 'ReceptorElement',
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
