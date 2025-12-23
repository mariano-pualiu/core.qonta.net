<?php

return [
    'model_name' => 'Nomina',
    'collection_name' => 'Nomina',
    'namespaces' => [
        'App\Containers\Sat\Nomina\Models\V12\Nomina' => 'NominaModels',
        'App\Containers\Sat\Nomina\Values\V12\Attributes\Nomina' => 'NominaAttributes',
        'App\Containers\Sat\Nomina\Values\V12\Elements\NominaElement' => 'NominaElement',
    ],
    'properties' => [
        'deserializers' => [
            'http://www.sat.gob.mx/nomina12' => [
                'Emisor' => 'NominaModels\Emisor::class',
                'Receptor' => 'NominaModels\Receptor::class',
                'Percepciones' => 'NominaModels\Percepciones::class',
                'Deducciones' => 'NominaModels\Deducciones::class',
                'OtrosPagos' => 'NominaModels\OtrosPagos::class',
                'Incapacidades' => 'NominaModels\Incapacidades::class',
            ],
        ],
    ],
    'methods' => [
        'relationships' => [
            'has_one' => [
                'emisor' => [
                    'NominaModels\Emisor::class',
                ],
                'receptor' => [
                    'NominaModels\Receptor::class',
                ],
                'percepciones' => [
                    'NominaModels\Percepciones::class',
                ],
                'deducciones' => [
                    'NominaModels\Deducciones::class',
                ],
                'otrosPagos' => [
                    'NominaModels\OtrosPagos::class',
                ],
                'incapacidades' => [
                    'NominaModels\Incapacidades::class',
                ],
            ],
        ]
    ]
];
