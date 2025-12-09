<?php

return [
    'model_name' => 'Traslado',
    'collection_name' => 'Traslado',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Traslados\Traslado' => 'TrasladoAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\Impuestos\Traslados\TrasladoElement' => 'TrasladoElement',
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
