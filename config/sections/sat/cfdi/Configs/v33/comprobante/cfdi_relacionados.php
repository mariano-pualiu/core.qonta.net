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
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'CfdiRelacionado' => 'CfdiRelacionadosModels\CfdiRelacionado::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'cfdiRelacionado' => [
                    'CfdiRelacionadosModels\CfdiRelacionado::class',
                ],
            ],
            'belongs_to' => [
                'comprobante' => [
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
