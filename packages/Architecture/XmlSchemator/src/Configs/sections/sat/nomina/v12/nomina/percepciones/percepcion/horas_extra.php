<?php

return [
    'model_name' => 'HorasExtra',
    'collection_name' => 'HorasExtra',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones' => 'PercepcionesModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion\HorasExtra' => 'HorasExtraAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\Percepcion\HorasExtraElement' => 'HorasExtraElement',
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
