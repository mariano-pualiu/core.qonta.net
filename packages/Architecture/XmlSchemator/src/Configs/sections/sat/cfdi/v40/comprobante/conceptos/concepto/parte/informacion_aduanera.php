<?php

return [
    'model_name' => 'InformacionAduanera',
    'collection_name' => 'InformacionAduanera',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte\InformacionAduanera' => 'InformacionAduaneraAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Parte\InformacionAduaneraElement' => 'InformacionAduaneraElement',
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
                'parte' => [
                    'ConceptoModels\Parte::class',
                ],
            ],
        ]
    ]
];
