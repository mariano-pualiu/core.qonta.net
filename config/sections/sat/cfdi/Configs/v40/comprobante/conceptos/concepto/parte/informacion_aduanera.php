<?php

return [
    'model_name' => 'InformacionAduanera',
    'collection_name' => 'InformacionAduanera',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto\Parte\InformacionAduanera' => 'InformacionAduaneraAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Parte\InformacionAduaneraElement' => 'InformacionAduaneraElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'parte' => [
                    'ConceptoModels\Parte::class',
                ],
            ],
        ]
    ]
];
