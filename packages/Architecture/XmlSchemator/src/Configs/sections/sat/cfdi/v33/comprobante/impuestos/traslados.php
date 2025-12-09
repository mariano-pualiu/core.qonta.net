<?php

return [
    'model_name' => 'Traslados',
    'collection_name' => 'Traslados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos\Traslados' => 'TrasladosModels',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos\TrasladosElement' => 'TrasladosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'Traslado' => 'TrasladosModels\Traslado::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsMany' => [
                'traslado' => [
                    'TrasladosModels\Traslado::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'impuestos' => [
                    'ComprobanteModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
