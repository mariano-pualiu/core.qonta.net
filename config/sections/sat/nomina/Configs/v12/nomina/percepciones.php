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
            'embeds_many' => [
                'percepcion' => [
                    'PercepcionesModels\Percepcion::class',
                ],
            ],
            'embeds_one' => [
                'jubilacionPensionRetiro' => [
                    'PercepcionesModels\JubilacionPensionRetiro::class',
                ],
                'separacionIndemnizacion' => [
                    'PercepcionesModels\SeparacionIndemnizacion::class',
                ],
            ],
            'belongs_to' => [
                'nomina' => [
                    'Nominav12Models\Nomina::class',
                ],
            ],
        ]
    ]
];
