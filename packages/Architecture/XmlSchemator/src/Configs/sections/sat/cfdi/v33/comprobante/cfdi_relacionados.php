<?php

return [
    'model_name' => 'CfdiRelacionados',
    'collection_name' => 'CfdiRelacionados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\CfdiRelacionados' => 'CfdiRelacionadosModels',
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\CfdiRelacionados' => 'CfdiRelacionadosAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\CfdiRelacionadosElement' => 'CfdiRelacionadosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'CfdiRelacionado' => 'CfdiRelacionadosModels\CfdiRelacionado::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsMany' => [
                'cfdiRelacionado' => [
                    'CfdiRelacionadosModels\CfdiRelacionado::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'comprobante' => [
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
