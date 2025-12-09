<?php

return [
    'model_name' => 'Traslados',
    'collection_name' => 'Traslados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Impuestos\Traslados' => 'TrasladosModels',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\Impuestos\TrasladosElement' => 'TrasladosElement',
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
                    'ConceptoModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
