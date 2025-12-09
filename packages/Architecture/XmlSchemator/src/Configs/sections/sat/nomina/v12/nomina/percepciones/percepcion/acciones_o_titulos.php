<?php

return [
    'model_name' => 'AccionesOTitulos',
    'collection_name' => 'AccionesOTitulos',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones' => 'PercepcionesModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\AccionesOTitulos' => 'AccionesOTitulosAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\Percepcion\AccionesOTitulosElement' => 'AccionesOTitulosElement',
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
                'percepcion' => [
                    'PercepcionesModels\Percepcion::class',
                ],
            ],
        ]
    ]
];
