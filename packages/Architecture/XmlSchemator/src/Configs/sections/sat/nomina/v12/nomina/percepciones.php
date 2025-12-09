<?php

return [
    'model_name' => 'Percepciones',
    'collection_name' => 'Percepciones',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina\Percepciones' => 'PercepcionesModels',
        'App\Containers\Sat\Nomina\Models\V12' => 'NominaV12Models',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina\Percepciones' => 'PercepcionesAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\Nomina\PercepcionesElement' => 'PercepcionesElement',
    ],
    'implements' => [],
    'traits' => [],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'Percepcion' => 'PercepcionesModels\Percepcion::class',
                'JubilacionPensionRetiro' => 'PercepcionesModels\JubilacionPensionRetiro::class',
                'SeparacionIndemnizacion' => 'PercepcionesModels\SeparacionIndemnizacion::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'MongoDB\Laravel\Relations\EmbedsMany' => [
                'percepcion' => [
                    'PercepcionesModels\Percepcion::class',
                ],
            ],
            'MongoDB\Laravel\Relations\EmbedsOne' => [
                'jubilacionPensionRetiro' => [
                    'PercepcionesModels\JubilacionPensionRetiro::class',
                ],
                'separacionIndemnizacion' => [
                    'PercepcionesModels\SeparacionIndemnizacion::class',
                ],
            ],
            'MongoDB\Laravel\Relations\BelongsTo' => [
                'nomina' => [
                    'Nominav12Models\Nomina::class',
                ],
            ],
        ]
    ]
];
