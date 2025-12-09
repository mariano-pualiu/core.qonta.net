<?php

return [
    'model_name' => 'InformacionAduanera',
    'collection_name' => 'InformacionAduanera',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\InformacionAduanera' => 'InformacionAduaneraAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\InformacionAduaneraElement' => 'InformacionAduaneraElement',
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
