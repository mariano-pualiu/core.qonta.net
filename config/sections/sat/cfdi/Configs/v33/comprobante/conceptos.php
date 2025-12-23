<?php

return [
    'model_name' => 'Conceptos',
    'collection_name' => 'Conceptos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\ConceptosElement' => 'ConceptosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'Concepto' => 'ConceptosModels\Concepto::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'concepto' => [
                    'ConceptosModels\Concepto::class',
                ],
            ],
            'belongs_to' => [
                'comprobante' => [
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
