<?php

return [
    'model_name' => 'Receptor',
    'collection_name' => 'Receptor',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Receptor' => 'ReceptorAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ReceptorElement' => 'ReceptorElement',
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
