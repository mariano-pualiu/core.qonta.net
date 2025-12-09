<?php

return [
    'model_name' => 'CuentaPredial',
    'collection_name' => 'CuentaPredial',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\CuentaPredial' => 'CuentaPredialAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\CuentaPredialElement' => 'CuentaPredialElement',
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
                'concepto' => [
                    'ConceptosModels\Concepto::class',
                ],
            ],
        ]
    ]
];
