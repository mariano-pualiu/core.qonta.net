<?php

return [
    'model_name' => 'Impuestos',
    'collection_name' => 'Impuestos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Models\V40' => 'CfdiV40Models',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos' => 'ImpuestosAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\ImpuestosElement' => 'ImpuestosElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'Retenciones' => 'ImpuestosModels\Retenciones::class',
                'Traslados' => 'ImpuestosModels\Traslados::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_one' => [
                'retenciones' => [
                    'ImpuestosModels\Retenciones::class',
                ],
                'traslados' => [
                    'ImpuestosModels\Traslados::class',
                ],
            ],
            'belongs_to' => [
                'comprobante' => [
                    'Cfdiv40Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
