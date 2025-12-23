<?php

return [
    'model_name' => 'Concepto',
    'collection_name' => 'Concepto',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto' => 'ConceptoAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\ConceptoElement' => 'ConceptoElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'Impuestos' => 'ConceptoModels\Impuestos::class',
                'InformacionAduanera' => 'ConceptoModels\InformacionAduanera::class',
                'CuentaPredial' => 'ConceptoModels\CuentaPredial::class',
                'ComplementoConcepto' => 'ConceptoModels\ComplementoConcepto::class',
                'Parte' => 'ConceptoModels\Parte::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_one' => [
                'impuestos' => [
                    'ConceptoModels\Impuestos::class',
                ],
            ],
            'has_many' => [
                'informacionAduanera' => [
                    'ConceptoModels\InformacionAduanera::class',
                ],
                'parte' => [
                    'ConceptoModels\Parte::class',
                ],
            ],
            'embeds_one' => [
                'cuentaPredial' => [
                    'ConceptoModels\CuentaPredial::class',
                ],
                'complementoConcepto' => [
                    'ConceptoModels\ComplementoConcepto::class',
                ],
            ],
            'belongs_to' => [
                'conceptos' => [
                    'ComprobanteModels\Conceptos::class',
                ],
            ],
        ]
    ]
];
