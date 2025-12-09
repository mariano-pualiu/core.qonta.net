<?php

return [
    'model_name' => 'ACuentaTerceros',
    'collection_name' => 'ACuentaTerceros',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\ACuentaTerceros' => 'ACuentaTercerosAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\ACuentaTercerosElement' => 'ACuentaTercerosElement',
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
