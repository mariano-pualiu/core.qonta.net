<?php

return [
    'model_name'      => 'Comprobante',
    'collection_name' => 'Comprobante',
    'namespaces'      => [
        'App\Containers\Architecture\XmlSchemator\Analyzers\Xml\Casts\Attributes\NamespacesCast' => 'NamespacesCast',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante'                                         => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante'                              => 'ComprobanteAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Element\Comprobante'                                 => 'ComprobanteElements',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\ComprobanteElement'                         => 'ComprobanteElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'InformacionGlobal' => 'ComprobanteModels\InformacionGlobal::class',
                'CfdiRelacionados'  => 'ComprobanteModels\CfdiRelacionados::class',
                'Emisor'            => 'ComprobanteModels\Emisor::class',
                'Receptor'          => 'ComprobanteModels\Receptor::class',
                'Conceptos'         => 'ComprobanteModels\Conceptos::class',
                'Impuestos'         => 'ComprobanteModels\Impuestos::class',
                'Complemento'       => 'ComprobanteModels\Complemento::class',
                'Addenda'           => 'ComprobanteModels\Addenda::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'informacionGlobal' => [
                    'ComprobanteModels\InformacionGlobal::class',
                ],
                'emisor' => [
                    'ComprobanteModels\Emisor::class',
                ],
                'receptor' => [
                    'ComprobanteModels\Receptor::class',
                ],
                'complemento' => [
                    'ComprobanteModels\Complemento::class',
                ],
                'addenda' => [
                    'ComprobanteModels\Addenda::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasMany' => [
                'cfdiRelacionados' => [
                    'ComprobanteModels\CfdiRelacionados::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasOne' => [
                'conceptos' => [
                    'ComprobanteModels\Conceptos::class',
                ],
                'impuestos' => [
                    'ComprobanteModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
