<?php

return [
    'model_name' => 'Traslado',
    'collection_name' => 'Traslado',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Traslados\Traslado' => 'TrasladoAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Impuestos\Traslados\TrasladoElement' => 'TrasladoElement',
    ],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'belongs_to' => [
                'traslados' => [
                    'ImpuestosModels\Traslados::class',
                ],
            ],
        ]
    ]
];
