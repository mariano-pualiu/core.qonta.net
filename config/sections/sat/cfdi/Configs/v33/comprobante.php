<?php

return [
    'model_name' => 'Comprobante',
    'collection_name' => 'Comprobante',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante' => 'ComprobanteAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\ComprobanteElement' => 'ComprobanteElement',
    ],
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
            'has_one' => [
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
            'embeds_one' => [
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
            'has_many' => [
                'complemento' => [
                    'ComprobanteModels\Complemento::class',
                ],
            ],
        ]
    ]
];
