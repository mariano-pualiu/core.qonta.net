<?php

return [
    'model_name' => 'Traslado',
    'collection_name' => 'Traslado',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos\Traslados\Traslado' => 'TrasladoAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos\Traslados\TrasladoElement' => 'TrasladoElement',
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
                'traslados' => [
                    'ImpuestosModels\Traslados::class',
                ],
            ],
        ]
    ]
];
