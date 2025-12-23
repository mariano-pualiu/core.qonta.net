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
            'embeds_one' => [
                'accionesOTitulos' => [
                    'PercepcionModels\AccionesOTitulos::class',
                ],
            ],
            'has_many' => [
                'horasExtra' => [
                    'PercepcionModels\HorasExtra::class',
                ],
            ],
            'belongs_to' => [
                'percepciones' => [
                    'NominaModels\Percepciones::class',
                ],
            ],
        ]
    ]
];
