<?php

return [
    'model_name' => 'Traslados',
    'collection_name' => 'Traslados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos\Traslados' => 'TrasladosModels',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Impuestos\TrasladosElement' => 'TrasladosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
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
