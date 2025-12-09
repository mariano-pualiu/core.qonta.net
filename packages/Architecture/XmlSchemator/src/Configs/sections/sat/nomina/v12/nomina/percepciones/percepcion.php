<?php

return [
    'model_name' => 'Percepcion',
    'collection_name' => 'Percepcion',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones\Percepcion' => 'PercepcionModels',
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones\Percepcion' => 'PercepcionAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\Percepciones\PercepcionElement' => 'PercepcionElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'AccionesOTitulos' => 'PercepcionModels\AccionesOTitulos::class',
                'HorasExtra' => 'PercepcionModels\HorasExtra::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'accionesOTitulos' => [
                    'PercepcionModels\AccionesOTitulos::class',
                ],
            ],
            'MongoDB\Laravel\Relations\HasMany' => [
                'horasExtra' => [
                    'PercepcionModels\HorasExtra::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'percepciones' => [
                    'NominaModels\Percepciones::class',
                ],
            ],
        ]
    ]
];
