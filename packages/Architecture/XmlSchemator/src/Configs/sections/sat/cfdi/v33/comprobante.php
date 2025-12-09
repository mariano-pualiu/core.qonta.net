<?php

return [
    'model_name' => 'Comprobante',
    'collection_name' => 'Comprobante',
    'element' => [
        'namespaces' => [],
        'attributes' => [],
    ],
    'namespaces' => [
        'App\Containers\Architecture\XmlSchemator\Analyzers\Xml\Casts\Attributes\NamespacesCast' => 'NamespacesCast',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante'                                         => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante'                              => 'ComprobanteAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\ComprobanteElement'                         => 'ComprobanteElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'CfdiRelacionados' => 'ComprobanteModels\CfdiRelacionados::class',
                'Emisor' => 'ComprobanteModels\Emisor::class',
                'Receptor' => 'ComprobanteModels\Receptor::class',
                'Conceptos' => 'ComprobanteModels\Conceptos::class',
                'Impuestos' => 'ComprobanteModels\Impuestos::class',
                'Complemento' => 'ComprobanteModels\Complemento::class',
                'Addenda' => 'ComprobanteModels\Addenda::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\HasOne' => [
                'cfdiRelacionados' => [
                    'ComprobanteModels\CfdiRelacionados::class',
                ],
                'conceptos' => [
                    'ComprobanteModels\Conceptos::class',
                ],
                'impuestos' => [
                    'ComprobanteModels\Impuestos::class',
                ],
            ],
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'emisor' => [
                    'ComprobanteModels\Emisor::class',
                ],
                'receptor' => [
                    'ComprobanteModels\Receptor::class',
                ],
                'addenda' => [
                    'ComprobanteModels\Addenda::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasMany' => [
                'complemento' => [
                    'ComprobanteModels\Complemento::class',
                ],
            ],
        ]
    ]
];
