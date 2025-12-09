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
    'implements' => [],
    'traits' => [],
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
            'MongoDB\Laravel\Relations\HasOne' => [
                'impuestos' => [
                    'ConceptoModels\Impuestos::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasMany' => [
                'informacionAduanera' => [
                    'ConceptoModels\InformacionAduanera::class',
                ],
                'parte' => [
                    'ConceptoModels\Parte::class',
                ],
            ],
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'cuentaPredial' => [
                    'ConceptoModels\CuentaPredial::class',
                ],
                'complementoConcepto' => [
                    'ConceptoModels\ComplementoConcepto::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'conceptos' => [
                    'ComprobanteModels\Conceptos::class',
                ],
            ],
        ]
    ]
];
