<?php

return [
    'model_name' => 'Conceptos',
    'collection_name' => 'Conceptos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ConceptosElement' => 'ConceptosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
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
                    'Cfdiv40Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
