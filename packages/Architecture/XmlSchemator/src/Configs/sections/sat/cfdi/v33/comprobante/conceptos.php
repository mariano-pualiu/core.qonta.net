<?php

return [
    'model_name' => 'Conceptos',
    'collection_name' => 'Conceptos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\ConceptosElement' => 'ConceptosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
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
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
