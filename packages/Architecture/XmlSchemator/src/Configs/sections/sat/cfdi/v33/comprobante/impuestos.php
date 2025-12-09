<?php

return [
    'model_name' => 'Impuestos',
    'collection_name' => 'Impuestos',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Models\V33' => 'CfdiV33Models',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Impuestos' => 'ImpuestosAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\ImpuestosElement' => 'ImpuestosElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'Retenciones' => 'ImpuestosModels\Retenciones::class',
                'Traslados' => 'ImpuestosModels\Traslados::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\HasOne' => [
                'retenciones' => [
                    'ImpuestosModels\Retenciones::class',
                ],
                'traslados' => [
                    'ImpuestosModels\Traslados::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'comprobante' => [
                    'Cfdiv33Models\Comprobante::class',
                ],
            ],
        ]
    ]
];
