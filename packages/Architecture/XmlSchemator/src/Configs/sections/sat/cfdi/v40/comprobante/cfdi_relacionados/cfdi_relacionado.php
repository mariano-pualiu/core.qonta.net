<?php

return [
    'model_name' => 'CfdiRelacionado',
    'collection_name' => 'CfdiRelacionado',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\CfdiRelacionados\CfdiRelacionado' => 'CfdiRelacionadoAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\CfdiRelacionados\CfdiRelacionadoElement' => 'CfdiRelacionadoElement',
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
