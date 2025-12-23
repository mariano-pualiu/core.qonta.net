<?php

return [
    'model_name' => 'Traslados',
    'collection_name' => 'Traslados',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Impuestos\Traslados' => 'TrasladosModels',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\Impuestos\TrasladosElement' => 'TrasladosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'Traslado' => 'TrasladosModels\Traslado::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'traslado' => [
                    'TrasladosModels\Traslado::class',
                ],
            ],
            'belongs_to' => [
                'impuestos' => [
                    'ConceptoModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
