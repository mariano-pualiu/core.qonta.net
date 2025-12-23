<?php

return [
    'model_name' => 'Retenciones',
    'collection_name' => 'Retenciones',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Impuestos\Retenciones' => 'RetencionesModels',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante' => 'ComprobanteModels',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Impuestos\RetencionesElement' => 'RetencionesElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
                'Retencion' => 'RetencionesModels\Retencion::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'embeds_many' => [
                'retencion' => [
                    'RetencionesModels\Retencion::class',
                ],
            ],
            'belongs_to' => [
                'impuestos' => [
                    'ComprobanteModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
