<?php

return [
    'model_name' => 'Concepto',
    'collection_name' => 'Concepto',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Conceptos\Concepto' => 'ConceptoAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\ConceptoElement' => 'ConceptoElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'Impuestos' => 'ConceptoModels\Impuestos::class',
                'ACuentaTerceros' => 'ConceptoModels\ACuentaTerceros::class',
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
            'embeds_one' => [
                'aCuentaTerceros' => [
                    'ConceptoModels\ACuentaTerceros::class',
                ],
                'complementoConcepto' => [
                    'ConceptoModels\ComplementoConcepto::class',
                ],
            ],
            'has_many' => [
                'informacionAduanera' => [
                    'ConceptoModels\InformacionAduanera::class',
                ],
                'cuentaPredial' => [
                    'ConceptoModels\CuentaPredial::class',
                ],
                'parte' => [
                    'ConceptoModels\Parte::class',
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
