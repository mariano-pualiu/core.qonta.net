<?php

return [
    'model_name' => 'Retenciones',
    'collection_name' => 'Retenciones',
    'namespaces' => [
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto\Impuestos\Retenciones' => 'RetencionesModels',
        'App\Containers\Sat\Cfdi\Models\V40\Comprobante\Conceptos\Concepto' => 'ConceptoModels',
        'App\Containers\Sat\Cfdi\Values\V40\Elements\Comprobante\Conceptos\Concepto\Impuestos\RetencionesElement' => 'RetencionesElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/cfd/4' => [
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
                    'ConceptoModels\Impuestos::class',
                ],
            ],
        ]
    ]
];
