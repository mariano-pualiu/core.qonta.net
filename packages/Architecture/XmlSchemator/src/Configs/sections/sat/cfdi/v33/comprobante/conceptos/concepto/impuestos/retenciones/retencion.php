<?php

return [
    'model_name' => 'Retencion',
    'collection_name' => 'Retencion',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto\Impuestos' => 'ImpuestosModels',
        'App\Containers\Sat\Cfdi\Values\V33\Attributes\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\Retencion' => 'RetencionAttributes',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Conceptos\Concepto\Impuestos\Retenciones\RetencionElement' => 'RetencionElement',
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
