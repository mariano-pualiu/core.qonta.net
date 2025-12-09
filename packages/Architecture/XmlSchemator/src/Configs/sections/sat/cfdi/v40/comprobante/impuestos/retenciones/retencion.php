<?php

return [
    'model_name' => 'Retencion',
    'collection_name' => 'Retencion',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Values\V40\Attributes\Comprobante\Impuestos\Retenciones\Retencion' => 'RetencionAttributes',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Impuestos\Retenciones\RetencionElement' => 'RetencionElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'retenciones' => [
                    'ImpuestosModels\Retenciones::class',
                ],
            ],
        ]
    ]
];
