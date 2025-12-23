<?php

return [
    'model_name' => 'Parte',
    'collection_name' => 'Parte',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Parte' => 'ParteModels',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos' => 'ConceptosModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Parte' => 'ParteAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\ParteElement' => 'ParteElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'InformacionAduanera' => 'ParteModels\InformacionAduanera::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_many' => [
                'informacionAduanera' => [
                    'ParteModels\InformacionAduanera::class',
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
