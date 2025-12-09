<?php

return [
    'model_name' => 'CfdiRelacionado',
    'collection_name' => 'CfdiRelacionado',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\CfdiRelacionados\CfdiRelacionado' => 'CfdiRelacionadoAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\CfdiRelacionados\CfdiRelacionadoElement' => 'CfdiRelacionadoElement',
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
                'cfdiRelacionados' => [
                    'ComprobanteModels\CfdiRelacionados::class',
                ],
            ],
        ]
    ]
];
