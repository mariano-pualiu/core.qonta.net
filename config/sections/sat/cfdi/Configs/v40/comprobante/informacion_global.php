<?php

return [
    'model_name' => 'InformacionGlobal',
    'collection_name' => 'InformacionGlobal',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\InformacionGlobal' => 'InformacionGlobalAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\InformacionGlobalElement' => 'InformacionGlobalElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'comprobante' => [
                    'Cfdiv40Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
