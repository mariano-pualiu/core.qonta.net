<?php

return [
    'model_name' => 'CfdiRelacionados',
    'collection_name' => 'CfdiRelacionados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\CfdiRelacionados' => 'CfdiRelacionadosModels',
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\CfdiRelacionados' => 'CfdiRelacionadosAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\CfdiRelacionadosElement' => 'CfdiRelacionadosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
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
                    'Cfdiv40Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
