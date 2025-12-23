<?php

return [
    'model_name' => 'Traslados',
    'collection_name' => 'Traslados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos\Traslados' => 'TrasladosModels',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Impuestos\TrasladosElement' => 'TrasladosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'Traslado' => 'TrasladosModels\Traslado::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'traslado' => [
                    'TrasladosModels\Traslado::class',
                ],
            ],
            'belongs_to' => [
                'impuestos' => [
                    'ComprobanteModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
