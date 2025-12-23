<?php

return [
    'model_name' => 'Comprobante',
    'collection_name' => 'Comprobante',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante' => 'ComprobanteAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\ComprobanteElement' => 'ComprobanteElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'InformacionGlobal' => 'ComprobanteModels\InformacionGlobal::class',
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
            'embeds_one' => [
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
            'has_many' => [
                'cfdiRelacionados' => [
                    'ComprobanteModels\CfdiRelacionados::class',
                ],
            ],
            'has_one' => [
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
