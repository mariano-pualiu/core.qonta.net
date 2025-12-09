<?php

return [
    'model_name' => 'SeparacionIndemnizacion',
    'collection_name' => 'SeparacionIndemnizacion',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\SeparacionIndemnizacion' => 'SeparacionIndemnizacionAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\SeparacionIndemnizacionElement' => 'SeparacionIndemnizacionElement',
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
                'percepciones' => [
                    'NominaModels\Percepciones::class',
                ],
            ],
        ]
    ]
];
