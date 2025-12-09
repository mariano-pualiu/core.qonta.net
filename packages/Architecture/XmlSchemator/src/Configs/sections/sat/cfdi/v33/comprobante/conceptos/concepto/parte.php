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
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'InformacionAduanera' => 'ParteModels\InformacionAduanera::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\HasMany' => [
                'informacionAduanera' => [
                    'ParteModels\InformacionAduanera::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'concepto' => [
                    'ConceptosModels\Concepto::class',
                ],
            ],
        ]
    ]
];
