<?php

return [
    'model_name' => 'Conceptos',
    'collection_name' => 'Conceptos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ConceptosElement' => 'ConceptosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'Concepto' => 'ConceptosModels\Concepto::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsMany' => [
                'concepto' => [
                    'ConceptosModels\Concepto::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'comprobante' => [
                    'Cfdiv40Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
