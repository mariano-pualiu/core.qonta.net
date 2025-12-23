<?php

return [
    'model_name' => 'Impuestos',
    'collection_name' => 'Impuestos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\ImpuestosElement' => 'ImpuestosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'Traslados' => 'ImpuestosModels\Traslados::class',
                'Retenciones' => 'ImpuestosModels\Retenciones::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_one' => [
                'traslados' => [
                    'ImpuestosModels\Traslados::class',
                ],
                'retenciones' => [
                    'ImpuestosModels\Retenciones::class',
                ],
            ],
            'belongs_to' => [
                'concepto' => [
                    'ConceptosModels\Concepto::class',
                ],
            ],
        ]
    ]
];
