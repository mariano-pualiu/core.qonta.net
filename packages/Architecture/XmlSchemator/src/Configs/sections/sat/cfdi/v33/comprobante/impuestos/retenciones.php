<?php

return [
    'model_name' => 'Retenciones',
    'collection_name' => 'Retenciones',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante\Impuestos\Retenciones' => 'RetencionesModels',
        'App\Containers\Sat\Cfdi\Models\V33\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V33\Elements\Comprobante\Impuestos\RetencionesElement' => 'RetencionesElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/3' => [
                'Retencion' => 'RetencionesModels\Retencion::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsMany' => [
                'retencion' => [
                    'RetencionesModels\Retencion::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'impuestos' => [
                    'ComprobanteModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
